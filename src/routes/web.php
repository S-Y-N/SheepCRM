<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Employee\EmployeeController;
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
    Route::group(['prefix'=>'companies'],function (){
        Route::get('/',[CompanyController::class,'index'])->name('company.index');
        Route::get('/create',[CompanyController::class,'create'])->name('company.create');
        Route::get('/search', [CompanyController::class,'search'])->name('company.search');
        Route::get('/{company}',[CompanyController::class,'show'])->name('company.show');
        Route::post('/',[CompanyController::class,'store'])->name('company.store');
        Route::get('/{company}/edit',[CompanyController::class,'edit'])->name('company.edit');
        Route::patch('/{company}',[CompanyController::class,'update'])->name('company.update');
        Route::delete('/{company}',[CompanyController::class,'destroy'])->name('company.delete');
    });

//Сторінка працівників
    Route::group(['prefix'=>'employees'],function (){
        Route::get('/',[EmployeeController::class,'index'])->name('employee.index');
        Route::get('/create',[EmployeeController::class,'create'])->name('employee.create');
        Route::get('/search', [EmployeeController::class,'search'])->name('employee.search');
        Route::get('/{employee}',[EmployeeController::class,'show'])->name('employee.show');
        Route::post('/',[EmployeeController::class,'store'])->name('employee.store');
        Route::get('/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
        Route::patch('/{employee}',[EmployeeController::class,'update'])->name('employee.update');
        Route::delete('/{employee}',[EmployeeController::class,'destroy'])->name('employee.delete');
    });
});

