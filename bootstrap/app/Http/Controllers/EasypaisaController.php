<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\form;

class EasypaisaController extends Controller
{
   public function payment(Request $request)
{

$amount = $request->amount * 100;

$storeId = "YOUR_STORE_ID";
$hashKey = "YOUR_HASH_KEY";

$transactionId = "TXN".time();
DB::table('payments')->insert([
'transaction_id' => $transactionId,
'amount' => $amount,
'payment_method' => 'easypaisa',
'status' => 'pending',
'created_at' => now(),
'updated_at' => now()
]);

$data = [
'storeId' => $storeId,
'amount' => $amount,
'transactionId' => $transactionId,
'postBackURL' => route('easypaisa.response') ,
'orderRefNum' => $transactionId
];

$string = implode('&', $data);

$secureHash = hash_hmac('sha256', $string, $hashKey);

$data['secureHash'] = $secureHash;

return view('user.easypaisa.redirectview',compact('data'));

}
public function response(Request $request)
{

$status = $request->responseCode;
$transactionId = $request->orderRefNum;

if($status == "0000"){

DB::table('payments')
->where('transaction_id',$transactionId)
->update([
'status' => 'paid'
]);

return redirect()->route('payment.success');

}else{

DB::table('payments')
->where('transaction_id',$transactionId)
->update([
'status' => 'failed'
]);

return redirect()->route('payment.failed');

}

}

}

