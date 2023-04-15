<?php

use App\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;

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

Route::get('/admin/add_product', [AdminController::class, 'add_product']);
Route::resource('admin', AdminController::class);
Route::resource('index', IndexController::class);
//cart controller
//Route::get('cart/shipping_payment', [CartController::class, 'shipping_payment']);
Route::resource('shipping_payment', PaymentController::class);
Route::resource('cart', CartController::class);
Route::resource('billing', BillingController::class);
//Route::put('cart/shipping_payment', [CartController::class, 'shipping_payment']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::resource('contact', ContactController::class);

Route::get('/', function () {
    return redirect('index');

});

Route::get('/search', [SearchController::class, 'search']);

Route::get('/shop', [ShopController::class, 'viewShop']);
Route::get('/product/{product_id}', [ShopController::class, 'viewProduct'])->name('product');

//TODO delete before submission
Route::get('/phpinfo', function () {
    //return view('welcome');
    //echo bcrypt('adminadmin');
    return phpinfo();

});
