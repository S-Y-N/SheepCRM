<?php

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
//Аутентифікаця
Route::group(['prefix'=>'auth','namespace'=> 'App\Http\Controllers\Auth'],function (){
    Route::get('/','IndexController')->name('auth.index');
    Route::post('/','AuthenticateController')->name('auth.auth');
    Route::get('/deauth','DeauthenticateController')->name('auth.deauth');
});

Route::group(['middleware'=>'auth'],function (){

    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    });
//Головна сторінка
    Route::group(['namespace'=>'App\Http\Controllers\Main'],function (){
        Route::get('/','IndexController')->name('main.index');
    });

//Сторінка компаній
    Route::group(['prefix'=>'companies','namespace'=>'App\Http\Controllers\Company'],function (){
        Route::get('/','IndexController')->name('company.index');
        Route::get('/create','CreateController')->name('company.create');
        Route::get('/search/', 'SearchController')->name('company.search');
        Route::get('/{company}','ShowController')->name('company.show');
        Route::post('/','StoreController')->name('company.store');
        Route::get('/{company}/edit','EditController')->name('company.edit');
        Route::patch('/{company}','UpdateController')->name('company.update');
        Route::delete('/{company}','DeleteController')->name('company.delete');
    });
//Сторінка працівників
    Route::group(['prefix'=>'employees','namespace'=>'App\Http\Controllers\Employee'],function (){
        Route::get('/','IndexController')->name('employee.index');
        Route::get('/create','CreateController')->name('employee.create');
        Route::get('/search/', 'SearchController')->name('employee.search');
        Route::get('/{employee}','ShowController')->name('employee.show');
        Route::post('/','StoreController')->name('employee.store');
        Route::get('/{employee}/edit','EditController')->name('employee.edit');
        Route::patch('/{employee}','UpdateController')->name('employee.update');
        Route::delete('/{employee}','DeleteController')->name('employee.delete');
    });
});

