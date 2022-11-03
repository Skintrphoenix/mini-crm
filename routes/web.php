<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::get('actionlogout', [AuthController::class, 'actionlogout'])->name('actionlogout');
    
    Route::resource('companies', CompaniesController::class);
    Route::resource('employees', EmployeesController::class);
});