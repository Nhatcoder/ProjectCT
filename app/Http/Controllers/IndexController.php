<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::select('name', 'image', 'price', 'id', 'created_at', 'short_description')->get();
        return view('index', compact('products'));
    }


    public function productDetail($id)
    {
        $product = Product::find($id);
        if(!isset($product)){
            return redirect('/');
        }
        return view('client.detail', compact('product'));
    }

    
}
