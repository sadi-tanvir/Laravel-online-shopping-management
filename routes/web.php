<?php

use App\Http\Controllers\AboutController\AboutController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\CommonControllerPanel\CommonController;
use App\Http\Controllers\ContactController\ContactController;
use App\Http\Controllers\ProductController\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPanel\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//-------------------------- custom routes------------------------//
// normal routes
Route::controller(ProductController::class)->name("products.")->group(function () {
    Route::get('/', "index")->name('display');
    Route::get('/products/{id}', "details")->name('details');
});
Route::controller(ContactController::class)->prefix("/contact")->name("contact.")->group(function () {
    Route::get('/', "index")->name('us');
    Route::post('/send', "createContact")->name('create');
});
Route::get('/about', [AboutController::class, "index"])->name('about.us');


// admin routes
Route::controller(AdminController::class)->group(function () {
    Route::middleware(['auth', 'role:admin'])->prefix('/admin/dashboard')->name('admin.dashboard.')->group(function () {
        Route::get("/allUsers", 'index')->name('allUsers');
        Route::delete('/user/{id}/delete', "userDelete");
        Route::get('/user/{id}/details', "userDetails")->name("user.details");
        Route::get("/allProducts", 'productsView')->name('allProducts');
        Route::get("/allProducts/{id}/productDetails", 'productsDetailsView')->name('productDetails');
        Route::get("/createProduct", 'createProduct')->name('createProduct');
        Route::post("/storeProduct", 'storeProduct')->name('storeProduct');
        Route::delete('/products/{id}/delete', "deleteProduct");
        Route::get('/products/{id}/edit', "edit")->name('products.edit');
        Route::put('/products/{id}/update', "updateProduct")->name('products.update');
        Route::get('/messages', "viewMessages")->name('messages');
        Route::delete('/messages/{id}/delete', "deleteMessage")->name('messages.delete');
    });
});


// user routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get("user/dashboard", [UserController::class, 'index'])->name('user.dashboard');
});

// user & admin routes
Route::controller(CommonController::class)->group(function () {
    Route::middleware('auth')->prefix("/profile")->name("profile.")->group(function () {
        Route::get('/edit', 'edit')->name('edit');
        Route::patch('/update', 'update')->name('update');
    });
});
