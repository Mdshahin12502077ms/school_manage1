<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;
use Log;
use App\Models\CreatePayment;
use App\Models\amount;
use App\Models\Branch;
use Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Backend\PaymentTemp;
use App\Models\StRegistrationFund;
use Brian2694\Toastr\Facades\Toastr;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        return view('bkashT::bkash-payment');
    }
    public function createPayment(Request $request)
    {
        $amount = $request->input('amount'); // Use input() method for consistency
        $amountId = $request->input('amountId'); // Use input() method for consistency

        $inv = uniqid();


        $requestData = [
            'intent' => 'sale',
            'mode' => '0011',
            'payerReference' => $inv,
            'currency' => 'BDT',
            'amount' =>$amount,
            'merchantInvoiceNumber' => $inv,
            'callbackURL' =>route('bkash-callBack'),
        ];

        $request_data_json = json_encode($requestData);

        // Call the bKash API
        $response = BkashPaymentTokenize::cPayment($request_data_json);

        // dd($response);
        // Check if response is an array
        if (is_array($response)) {
            $paymentId = $response['paymentID'] ?? null;
            $bkashURL = $response['bkashURL'] ?? null;


            $payment= new PaymentTemp();
            $payment->amount_id = $amountId;
            $payment->payment_id =$response['paymentID'];
            $payment->save();
            // dd($paymentId); // Debug the payment ID

            if ($paymentId && $bkashURL) {
                return redirect()->away($bkashURL); // Redirect to bKash payment page
            } else {
                return response()->json(['status' => 'error', 'message' => 'Payment ID or bkashURL not received']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid response format']);
        }
    }




    public function callBack(Request $request)
    {

        $paymentId = $request->input('paymentID'); // or however you are receiving the paymentID

        // Retrieve amountId from the database using paymentId
        $temp = PaymentTemp::where('payment_id', $paymentId)->first();
        $amountId = $temp ? $temp->amount_id : null;

        if ($request->status == 'success'){
            $response = BkashPaymentTokenize::executePayment($request->paymentID);
            //$response = BkashPaymentTokenize::executePayment($request->paymentID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
            if (!$response){ //if executePayment payment not found call queryPayment
                $response = BkashPaymentTokenize::queryPayment($request->paymentID);
                // dd( $response);
                //$response = BkashPaymentTokenize::queryPayment($request->paymentID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
            }

            if (isset($response['statusCode']) && $response['statusCode'] == "0000" && $response['transactionStatus'] == "Completed") {
                /*
                 * for refund need to store
                 * paymentID and trxID
                 * */
                $payment=new createPayment();
                $payment->payment_id=$request->paymentID;
                $payment->transaction_id=$response['trxID'];
                $payment->amount=$response['amount'];
                $getBranchName=Branch::where('id',Auth::user()->id)->first();
                $branchName=$getBranchName->institute_name;
                $payment->branch_name=$branchName; // Assuming 'amount' is in the response
                $payment->status='Completed';
                $payment->save();

                //get amount id
                if ($amountId) {
                $amountRecord = StRegistrationFund::where('id', $amountId)->first();
                if ($amountRecord) {
                    $amountRecord->status = 'Paid'; // Or any status indicating the payment process has started
                    $amountRecord->save();
                  }
                }
                return redirect()->to('/Registration/student/all/fund/view')->with('message', 'Payment successful with transaction ID: ' . $response['trxID']);
                // return BkashPaymentTokenize::success('Thank you for your payment', $response['trxID']);
            }
            return BkashPaymentTokenize::failure($response['statusMessage']);
        }else if ($request->status == 'cancel'){
            return BkashPaymentTokenize::cancel('Your payment is canceled');
        }else{
            // toastr()->warning('Your transaction is failed');
            Toastr()->warning('Your transaction is failed');
            return redirect()->to('/Registration/student/all/fund/view');
            // return BkashPaymentTokenize::failure('Your transaction is failed');
        }
    }

    public function searchTnx($trxID)
    {
        //response
        return BkashPaymentTokenize::searchTransaction($trxID);
        //return BkashPaymentTokenize::searchTransaction($trxID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }

    public function refund(Request $request)
    {

        //response
        $paymentID = $request->input('paymentID');
        $trxID = $request->input('trxID');
        $amount = $request->input('amount');
        $reason = $request->input('reason');
        $sku = 'abc';

        // Call bKash API to process refund
        $response = BkashRefundTokenize::refund($paymentID, $trxID, $amount, $reason, $sku);
        if ($response){
             $refund=createPayment::where('payment_id',$paymentID)->first();
             $refund->refund_id=$response['refundTrxID' ];
             $refund->save();
        }
         // Redirect to another route with response data
              return redirect()->route('bkash-refund-status')
                           ->with('response', $response)
                            ->with('paymentID', $paymentID);
        // return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku);

        //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
    public function refundStatus(Request $request)
    {
       // Retrieve the response and paymentID from the session
            $response = $request->session()->get('response');
            // dd($response);
            $paymentID = $request->session()->get('paymentID');

              // Pass the response data to the view
                return BkashPaymentTokenize::success('Your Refund Request is successfully reached', $response['refundTrxID' ]);
        //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
}
