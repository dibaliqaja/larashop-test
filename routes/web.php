<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/', 'BuyerController@front')->name('front');
Route::get('detail/{id}', 'BuyerController@detail')->name('buyers.detail');

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');

    Route::get('markAsRead', function() {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('mark.as.read');

    Route::get('delete-notif/{id}', function($id) {
        auth()->user()->readNotifications
            ->where('id', $id)
            ->first()->delete();
        return redirect()->back();
    })->name('delete.notif');

    Route::post('cart/{id}', 'BuyerController@addToCart')->name('addto.cart');
    Route::get('cart', 'BuyerController@cart')->name('cart');

    Route::delete('checkout/{id}', 'BuyerController@delete')->name('cart.delete');
    Route::get('checkout', 'BuyerController@checkout')->name('checkout');
    Route::post('confirm', 'BuyerController@confirm')->name('confirm');

    Route::get('ordered', 'BuyerController@ordered')->name('ordered');
    Route::get('ordered/{id}', 'BuyerController@orderedDetail')->name('ordered.detail');

    Route::post('upload/{id}', 'BuyerController@upload')->name('upload');
});
