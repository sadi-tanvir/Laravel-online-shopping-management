<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereNot('id', Auth::user()->id)->get();
        return view('admin.display_users', ["users" => $users]);
    }

    public function userDelete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return back()->withSuccess("User Deleted Successfully!");
    }

    public function userDetails($id)
    {
        $user = User::where('id', $id)->first();
        return view("admin.user_details", ["user" => $user]);
    }

    public function productsView()
    {
        $products = Product::latest()->get();
        // dd($products);
        return view('admin.display_products', ["data" => $products]);
    }

    public function productsDetailsView($id)
    {
        $product = Product::where('id', $id)->first();
        return view("admin.product_details", ["product" => $product]);
    }

    public function createProduct()
    {
        return view("admin.create_product");
    }

    public function storeProduct(Request $request)
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
        return back()->withSuccess("Product Created Successfully!");
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path("products/") . $product->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return back()->withSuccess("Product Deleted Successfully!");
    }


    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view("admin.edit_product", ['product' => $product]);
    }


    public function updateProduct(Request $request, $id)
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
        return back()->withSuccess("Product Updated Successfully!");
    }


    public function viewMessages()
    {
        $messages = Contact::get();
        return view("admin.messages", ["messages" => $messages]);
    }

    public function deleteMessage($id)
    {
        $message = Contact::where('id', $id)->first();
        $message->delete();
        return back()->withSuccess('Message Deleted!');
    }
}
