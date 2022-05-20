<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeReportController;

use Illuminate\Support\Facades\Auth;

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
    //return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('createemployee',[AdminController::class,'createemployee'])->name('admin.createemployee');
    Route::post('storeemployee',[AdminController::class,'storeemployee'])->name('admin.storeemployee');
    Route::get('employeereport',[AdminController::class,'employeereport'])->name('admin.employeereport');
    Route::get('employeedetails/{email}',[AdminController::class,'employeedetails'])->name('admin.employeedetails');
    
    

    
    

});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function(){
Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::post('checkin',[EmployeeReportController::class,'checkin'])->name('user.checkin');
Route::get('checkout',[EmployeeReportController::class,'checkout'])->name('user.checkout');
Route::post('docheckout/{email}',[EmployeeReportController::class,'docheckout'])->name('user.docheckout');
Route::get('settings',[UserController::class,'settings'])->name('user.settings');

});
