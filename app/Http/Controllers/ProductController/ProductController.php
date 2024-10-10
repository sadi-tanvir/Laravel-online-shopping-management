<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function index()
    {
        // $products = DB::table('products')->get();
        $time_start = microtime(true);
        $cache = Redis::get('products');
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        if (isset($cache)) {
            $products = json_decode($cache);
            return view('products.index', ["data" => $products, "execution_time" => $execution_time]);
        } else {
            $time_start = microtime(true);
            $cache = Redis::get('blogs');
            $products = Product::latest()->get();
            $time_end = microtime(true);
            $execution_time = ($time_end - $time_start);
            Redis::set('products', json_encode($products));
            return view('products.index', ["data" => $products, "execution_time" => $execution_time]);
        }

        // dd($products);

    }

    public function details($id)
    {
        $product = Product::where('id', $id)->first();
        return view("products.details", ["product" => $product]);
    }
}
