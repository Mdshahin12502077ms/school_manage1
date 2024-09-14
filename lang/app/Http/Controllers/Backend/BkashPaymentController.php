<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StRegistrationFund;
class BkashPaymentController extends Controller
{
   public function catchAmountPay(Request $request){
    $id = $request->input('id');
    $amount = $request->input('amount');

    // Store the data in the session

    session(['payment_amount' => $amount]);
    session(['payment_id' => $id]);

    // Retrieve the stored session data for the response
    $storedAmount = session('payment_amount');
    $storeId=session('payment_id');
    // Return the stored value in the response
    return response()->json([
        // Fetch the stored session value
        'success' => true,
    ]);
   }
}
