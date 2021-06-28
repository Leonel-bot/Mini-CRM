<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\App;
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

/* Route::get('/', function () {
    return view('/');
}); */


Route::resource('/company', CompanyController::class)->middleware('auth.admin');
Route::resource('/employee', EmployeeController::class)->middleware('auth.admin');


Auth::routes(['register' => false, 'reset' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/' , [CompanyController::class, 'index'])->name('home');
});


Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return Redirect::back();
});