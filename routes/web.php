<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    //return view('welcome');

    return file_get_contents(__DIR__ . '/../resources/pages/index.html');

});

//TODO delete before submission
Route::get('/phpinfo', function () {
    //return view('welcome');

    return phpinfo();

});
