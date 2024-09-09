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

    // Process or store the data as needed
    // For example, you can store it in the session
    session(['payment_id' => $id]);
    session(['payment_amount' => $amount]);

    // Optionally return a response
    return response()->json([
        'success' => true,
    ]);
   }
}
