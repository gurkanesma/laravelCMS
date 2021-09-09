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

    Route::group(['prefix'=>'menu'],function(){
        Route::get('/','App\Http\Controllers\Cms\menusController@index')->name ('CMS.menus.list');
        Route::get('/create','App\Http\Controllers\Cms\menusController@create')->name('CMS.menus.create');
        Route::post('/create_post','App\Http\Controllers\Cms\menusController@create_post')->name('CMS.menus.create_post');
        Route::get('/createsub','App\Http\Controllers\Cms\menusController@createSub')->name('CMS.menus.createsub');
        Route::post('/createsub_post','App\Http\Controllers\Cms\menusController@createSub_post')->name('CMS.menus.createsub_post');
        Route::get('/remove/{id}','App\Http\Controllers\Cms\menusController@remove')->name('CMS.menus.remove');
        Route::get('/remove_subs/{id}','App\Http\Controllers\Cms\menusController@remove_subs')->name('CMS.menus.remove_subs');
        Route::get('/edit/{id}','App\Http\Controllers\Cms\menusController@edit')->name('CMS.menus.edit');
        Route::post('/edit_post/{id}','App\Http\Controllers\Cms\menusController@edit_post')->name('CMS.menus.edit_post');
        Route::get('/editsubs/{id}','App\Http\Controllers\Cms\menusController@editSubs')->name('CMS.menus.editsubs');
        Route::post('/editsubs_post/{id}','App\Http\Controllers\Cms\menusController@editSubs_post')->name('CMS.menus.editSubs_post');


    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'App\Http\Controllers\Cms\newsController@index')->name('CMS.news.list');
        Route::get('/create','App\Http\Controllers\Cms\newsController@create')->name('CMS.news.create');
        Route::post('/create_post','App\Http\Controllers\Cms\newsController@create_post')->name('CMS.news.create_post');
        Route::get('/remove/{id}','App\Http\Controllers\Cms\newsController@remove')->name('CMS.news.remove');
        Route::get('/edit/{id}', 'App\Http\Controllers\Cms\newsController@edit')->name('CMS.news.edit');
        Route::post('/edit_post/{id}' , 'App\Http\Controllers\Cms\newsController@edit_post')->name('CMS.news.edit_post');

    });
});


