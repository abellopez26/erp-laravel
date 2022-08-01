<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'category_name' => 'home',
        'page_name' => 'start',
        'has_scrollspy' => 0,
        'scrollspy_offset' => '',
    ];
    return view('admin.welcome')->with($data);
});


Route::resource('customers', CustomerController::class);

Route::resource('providers', ProviderController::class);

Route::resource('products', ProductController::class);

Route::resource('sales', SaleController::class);
