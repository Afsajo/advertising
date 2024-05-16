<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GuestProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(4);
        $title = 'Galery Produk';
        return view('product.index',compact('title','products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

     public function show(Product $product)
     {
        $title = 'Detail Produk '.$product->nama;
        return view('product.detail',compact('product','title'));
     }

}
