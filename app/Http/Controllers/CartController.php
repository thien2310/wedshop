<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    private $product;
    public function __construct(product $product)
    {
        $this->product = $product;
    }
    public function AddtoCart($id)
    {
        $product = $this->product->find($id);
        // dd($product);
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => 'http://127.0.0.1:8001' . $product->feature_image_path,
                'quantity' => 1

            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function ShowCart()
    {
        $carts = session()->get('cart');
        return view('home.showCart', compact('carts'));
    }

    public function changeQuantityCart(Request $request)
    {
        $carts = session()->get('cart');

        if ($request->id && $request->quantity) {

            $carts[$request->id]['quantity'] = $request->quantity;
            $price = $request->quantity * $carts[$request->id]['price'];
            session()->put('cart', $carts);

            return response()->json([
                'code' => 200,
                'message' => 'success',
                'price' => $price,

            ], 200);
        }
    }

    public function removeCart(Request $request)
    {
        $carts = session()->get('cart');
        $request->session()->flush();
        return response()->json([
            'code' => 200,
            'message' => 'Xóa toàn bộ giỏ hàng thành công !!! Tiếp tục mua sắmmm',

        ], 200);
    }

    public function removeItemCart(Request $request){
        $carts = session()->get('cart');
        unset($carts[$request->id]);
        session()->put('cart', $carts);

        return response()->json([
            'code' => 200,
            'message' => 'success',
            

        ], 200);

    }
}
