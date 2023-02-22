<?php

namespace App\Http\Controllers;


use App\Models\Catetgory;
use App\Models\menu;
use App\Models\product;
use App\Models\slider;


class HomeController extends Controller
{
    //
    private $slider;
    private $menu;
    private $category;
    private $product;

    public function __construct(slider $slider, menu $menu, Catetgory $category, product $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        $menus = $this->menu->where('parent_id', 0)->get();
        $sliders = $this->slider->latest()->get();

        return view('home.index', compact('sliders', 'menus'));
    }
    public function shop()
    {
        $products = $this->product->latest()->paginate(9);
        $categories = $this->category->where('parent_id', 0)->get();
        return view('home.shop', compact('categories', 'products'));
    }

    public function AddToProductdetail($id)
    {
        // session()->flush();

        $product = $this->product->find($id);
        // $cart = session()->get('cart');

        // if (isset($cart[$id])) {
        //     $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        // } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => 'http://127.0.0.1:8001'.$product->feature_image_path,
                'content' => $product->content,
                'quantity' => 1
            ];
        // }

        session()->put('cart', $cart);


        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function showdetailPoduct()
    {
        $carts = session()->get('cart');
        return view('home.detailPoduct', compact('carts'));
    }
    public function ShowCart(){
        
    }
}
