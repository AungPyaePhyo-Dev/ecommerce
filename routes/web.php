<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('/', 'login')->name("login");
Route::post('/', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('user-logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::get('/', fn()=>view('admin.home'))->name('admin-home');
    Route::resource('cats', CategoryController::class);
    Route::resource('cat.sub', SubCatController::class)->shallow();
});