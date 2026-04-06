<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   public function checkoutSubmit(Request $request)
{
    $cart = session()->get('cart', []);

    if(!$cart){
        return back()->with('error','Cart is empty');
    }

    $subtotal = 0;

    foreach ($cart as $id => $product) {
        $subtotal += $product['price'] * $product['quantity'];
    }

    $shipping = (float) $request->input('shipping',0);
    $total = $subtotal + $shipping;



    // Create main order
    $order = Orders::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,

        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'postcode' => $request->postcode,



        'subtotal' => $subtotal,
        'shipping' => $shipping,
        'total' => $total,
    ]);

    // Save order items
    foreach ($cart as $id => $product) {

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $product['quantity'],
            'price' => $product['price'],

        ]);
    }

    session()->forget('cart');
  if($request->input('cod')){
    return redirect()->route('easypaisa.payment')
    ->with('success','Order placed successfully!');
  }
  elseif($request->input('easypaisa')){
    return redirect()->route('easypaisa.payment');

}
elseif($request->input('jazzcash')){
    return redirect()->route('easypaisa.payment');

}
else{
    return redirect()->route('easypaisa.payment');

}
}
}
