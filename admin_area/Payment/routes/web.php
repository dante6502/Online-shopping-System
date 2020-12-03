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

Route::get('/pay', function () {
    return view('pay'); /* this displays the payment form thats my checkout.php page..work on it later */
});
Route::get('/confirm', function () {
    return view('confirm');/* this displays the confirm form page*/
});
Route::post('/confirm', 'App\Http\Controllers\MpesaController@confirm')->name('confirm');/* this handles the confirm form page*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');