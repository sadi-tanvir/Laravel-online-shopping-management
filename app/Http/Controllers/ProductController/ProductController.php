<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = DB::table('products')->get();
        $products = Product::latest()->get();
        // dd($products);
        return view('products.index', ["data" => $products]);
    }
    
    public function details($id)
    {
        $product = Product::where('id', $id)->first();
        return view("products.details", ["product" => $product]);
    }
}
