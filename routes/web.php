<?php

use App\Http\Controllers\AboutController\AboutController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\CommonControllerPanel\CommonController;
use App\Http\Controllers\ContactController\ContactController;
use App\Http\Controllers\ProductController\ProductController;
use App\Http\Controllers\UserPanel\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

// admin routes
Route::controller(AdminController::class)->group(function () {
    Route::middleware(['auth', 'role:admin'])->prefix('/admin/dashboard')->name('admin.dashboard.')->group(function () {
        // user routes
        Route::prefix('/users')->name('users.')->group(function () {
            Route::get("/", 'display_users')->name('display');
            Route::delete('/{id}/delete', "user_delete")->name('delete');
            Route::get('/{id}/details', "user_details")->name("details");
        });

        // product routes
        Route::prefix("/products")->name("products.")->group(function () {
            Route::get("/", 'products_display')->name('display');
            Route::get("/{id}/details", 'product_details')->name('details');
            Route::get("/create", 'create_product')->name('create');
            Route::post("/store", 'store_product')->name('store');
            Route::delete('/{id}/delete', "delete_product")->name('delete');
            Route::get('/{id}/edit', "edit_product")->name('edit');
            Route::put('/{id}/update', "update_product")->name('update');
        });

        // message routes
        Route::prefix("/messages")->name("messages.")->group(function () {
            Route::get('/', "display_messages")->name('display');
            Route::delete('/{id}/delete', "delete_message")->name('delete');
        });
    });
});



// user routes
Route::middleware(['auth', 'role:user'])->prefix("/user")->name("user.")->group(function () {
    Route::get("/dashboard", [UserController::class, 'index'])->name('dashboard');
});


// user & admin routes
Route::controller(CommonController::class)->group(function () {
    Route::middleware('auth')->prefix("/profile")->name("profile.")->group(function () {
        Route::get('/edit', 'edit')->name('edit');
        Route::patch('/update', 'update')->name('update');
    });
});



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
