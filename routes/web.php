<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\QuotationsController;
use App\Http\Controllers\ControllsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\HstoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Quotations;
use Illuminate\Http\Request;
use App\Models\Products;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// History
Route::middleware('auth')->group(function () {
    Route::get('/history', [HstoryController::class, 'index'])->name('history.history');        
});


// Products
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.view');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::post('/product', [ProductsController::class, 'editView'])->name('product.edit');
    Route::post('/products/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('/product/{id}', [ProductsController::class, 'destroy'])->name('product.destroy');
   
});

// Users
Route::middleware('auth')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.view');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::post('/user/createLink/{id}', [UsersController::class, 'createLink'])->name('user.link');
    Route::get('/user/{id}', [UsersController::class, 'view'])->name('users.clients');
    Route::post('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
   
});

Route::get('calculate/{token}', [LinkController::class, 'index'])->name('cost-calculate')->middleware('signed');
Route::post('/quotationsAdd', [LinkController::class, 'store'])->name('quotations.add');
Route::get('/quotationsDownload/{id}', [LinkController::class, 'download'])->name('quotations.download');
Route::get('/quotationsDownloadDone', [LinkController::class, 'done'])->name('quotations.downloaded')->middleware('signed');
// Quotations
Route::middleware('auth')->group(function () {
    Route::get('/quotations', [QuotationsController::class, 'index'])->name('quotations.view');
    Route::get('/quotations/create', [QuotationsController::class, 'create'])->name('quotations.create');
    Route::post('/quotations', [QuotationsController::class, 'store'])->name('quotations.store');
    Route::get('/quotationPrint', [QuotationsController::class, 'show'])->name('quotationPrint');
    Route::get('/quotation/{id}', [QuotationsController::class, 'download'])->name('quotation.download');
    Route::post('/quotation', [QuotationsController::class, 'calculator'])->name('quotation.calculator');
});


require __DIR__.'/auth.php';
