<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;



class ItemsController extends Controller
{
    public function index()
    {
         $products = Product::all();


        return view('user.index1', compact('products'));
    }



    public function view()
    {
        $products = Product::all();
        return view('user.productview', compact('products'));
    }









   public function cart()

{
    $products = session()->get('cart', []);

    $total = 0;
    foreach($products as $product) {
        $total += $product['price'] * $product['quantity'];
    }

    return view('user.cart', compact('products', 'total'));
}



    public function addToCart($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,

        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}

public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);

    $quantities = $request->input('quantities', []);

    foreach ($quantities as $id => $quantity) {

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
        }

    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Cart updated successfully!');
}
public function remove($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Product removed from cart!');
}
public function destroyCart($id)
{
    $cart = session()->get('cart', []);
if (isset($cart[$id]) && $cart[$id]['quantity'] > 0) {
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }


    return redirect()->back()->with('success', 'Cart cleared successfully!');


}

return redirect()->back()->with('error', '');
}

public function login() {
    return view('user.login');
}
public function logout() {
    session()->forget('');
    return redirect()->back()->with('success','');

}

public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    $subtotal = 0;
    foreach ($cart as $product) {
        $subtotal += $product['price'] * $product['quantity'];
    }


      $shipping = (float) $request->input('shipping', 0); // default free shipping
    $total = $subtotal + $shipping;


    return view('user.checkout', compact('cart', 'subtotal', 'shipping', 'total'));
}

public function checkoutSubmit(Request $request)
{
    $cart = session()->get('cart', []);

    $subtotal = 0;
    foreach ($cart as $product) {
        $subtotal += $product['price'] * $product['quantity'];
    }

    // Get selected shipping
    $shipping = (float) $request->input('shipping');

    $total = $subtotal + $shipping;

    // Here you would create the order and save to database
    // For now, just show confirmation
    return view('user.checkout', compact('cart','subtotal','shipping','total'));
}

public function search(Request $request)
{
   $search = $request->search;

    if ($search) {
        $products = Product::where('product_name', 'like', '%' . $search . '%')->get();
    } else {
        $products = Product::all();
    }

    return view('user.productsearch', compact('products'));
}

}
