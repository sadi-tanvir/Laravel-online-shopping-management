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

// custom routes
// normal routes
Route::get('/', [ProductController::class, "index"])->name('products.display');
Route::get('/products/{id}', [ProductController::class, "details"])->name('products.details');
Route::get('/about', [AboutController::class, "index"])->name('about.us');
Route::get('/contact', [ContactController::class, "index"])->name('contact.us');
Route::post('/contact/send', [ContactController::class, "createContact"])->name('contact.create');

// admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get("/admin/dashboard/allUsers", [AdminController::class, 'index'])->name('admin.dashboard.allUsers');
    Route::delete('/admin/dashboard/user/{id}/delete', [AdminController::class, "userDelete"]);
    Route::get('/admin/dashboard/user/{id}/details', [AdminController::class, "userDetails"])->name("admin.dashboard.user.details");
    Route::get("/admin/dashboard/allProducts", [AdminController::class, 'productsView'])->name('admin.dashboard.allProducts');
    Route::get("/admin/dashboard/allProducts/{id}/productDetails", [AdminController::class, 'productsDetailsView'])->name('admin.dashboard.productDetails');
    Route::get("/admin/dashboard/createProduct", [AdminController::class, 'createProduct'])->name('admin.dashboard.createProduct');
    Route::post("/admin/dashboard/storeProduct", [AdminController::class, 'storeProduct'])->name('admin.dashboard.storeProduct');
    Route::delete('/admin/products/{id}/delete', [AdminController::class, "destroy"]);
    Route::get('/admin/dashboard/products/{id}/edit', [AdminController::class, "edit"])->name('admin.dashboard.products.edit');
    Route::put('/admin/dashboard/products/{id}/update', [AdminController::class, "updateProduct"])->name('admin.dashboard.products.update');
    Route::get('/admin/dashboard/messages', [AdminController::class, "viewMessages"])->name('admin.dashboard.messages');
    Route::delete('/admin/dashboard/messages/{id}/delete', [AdminController::class, "deleteMessage"])->name('admin.dashboard.messages.delete');
});

// user routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get("user/dashboard", [UserController::class, 'index'])->name('user.dashboard');
});

// user & admin routes
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [CommonController::class, 'edit'])->name('profile.edit');
    Route::patch('/update/profile', [CommonController::class, 'update'])->name('profile.update');
});
