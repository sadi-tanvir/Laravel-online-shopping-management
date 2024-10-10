<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

use function Laravel\Prompts\search;

class AdminController extends Controller
{
    // Display all registered users
    public function display_users()
    {
        $users = User::where('id', 1)->orWhere('id', 10)->orWhere('id', 4)->get();
        // $users = User::paginate(5)->appends(['sort' => 'votes']);
        // return $users;
        $users = User::whereNot('id', Auth::user()->id)->paginate(5);
        return view('admin.display_users', ["users" => $users]);
    }

    // Delete a user
    public function user_delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return back()->withSuccess("User Deleted Successfully!");
    }

    // View user details
    public function user_details($id)
    {
        $user = User::where('id', $id)->first();
        return view("admin.user_details", ["user" => $user]);
    }

    // Display all the existing products
    public function products_display()
    {
        $products = Product::latest()->paginate(5);
        // dd($products);
        return view('admin.display_products', ["data" => $products]);
    }

    // View product details
    public function product_details($id)
    {
        $product = Product::where('id', $id)->first();
        return view("admin.product_details", ["product" => $product]);
    }

    // Display product creation form
    public function create_product()
    {
        return view("admin.create_product");
    }

    // Store product on the database
    public function store_product(Request $request)
    {
        // upload image
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:20000',
            'price' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        // return view('products.create');
        $request->image->move(public_path('products'), $imageName);

        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        // add product to redis
        $newProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'price' => $product->price
        ];

        if(Redis::exists("products")){
            $cacheProducts = collect(json_decode(Redis::get("products")));
            $cacheProducts->push($newProduct);
            Redis::set("products", json_encode($cacheProducts));
        }
        return back()->withSuccess("Product Created Successfully!");
    }

    // Delete a product
    public function delete_product($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path("products/") . $product->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();

        // delete from redis
        if(Redis::exists("products")){
            $cacheProducts = collect(json_decode(Redis::get("products")));
            $cacheProduct = $cacheProducts->where("id", $id)->first();
            $indexOfProduct = $cacheProducts->search($cacheProduct);
            $cacheProducts->forget($indexOfProduct);
            Redis::set("products", json_encode($cacheProducts));
        }

        return back()->withSuccess("Product Deleted Successfully!");
    }

    // Display product edit form
    public function edit_product($id)
    {
        $product = Product::where('id', $id)->first();
        return view("admin.edit_product", ['product' => $product]);
    }

    // Update the product
    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000'
        ]);

        $product = Product::where('id', $id)->first();
        if (isset($request->image)) {
            // upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        $cacheProducts = collect(json_decode(Redis::get("products")));
        $cacheProduct = $cacheProducts->where("id", $id)->first();
        $cacheProduct->name = $request->name;
        $cacheProduct->description = $request->description;
        $index = $cacheProducts->search($cacheProduct);
        $cacheProducts[$index] = $cacheProduct;
        Redis::set("products", json_encode($cacheProducts));

        return back()->withSuccess("Product Updated Successfully!");
    }


    // Display all the products
    public function display_messages()
    {
        $messages = Contact::get();
        return view("admin.messages", ["messages" => $messages]);
    }


    // Delete a message
    public function delete_message($id)
    {
        $message = Contact::where('id', $id)->first();
        $message->delete();
        return back()->withSuccess('Message Deleted!');
    }
};
