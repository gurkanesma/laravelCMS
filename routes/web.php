<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/exit', function (){\Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('log_out');

/*
 * Burada bi şart var ona göre alt kısmı yapıyor. Şart yanlış olduğu için home kısmını çağırmıyo
 *
 * */

// Muhtemelen oturum açıksa sol menüyüde getiren satır
Route::group(['prefix'=> 'panel', 'middleware' => 'auth'], function () {

    // Anasayfayı getirir.
    Route::get('/', function () {
        return view('CMS.home');})->name('CMS.home');

    Route::group(['prefix' => 'news'], function () {
        Route::get('/create','App\Http\Controllers\Cms\newsController@create')->name('CMS.news.create');
    });


});


