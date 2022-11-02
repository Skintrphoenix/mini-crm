<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');



Route::get('/companies', [CompaniesController::class, 'index'])->name('companies')->middleware('auth');
Route::post('/companies/update/{data}', [CompaniesController::class, 'update'])->name('companies.update')->middleware('auth');
Route::get('/companies/edit/{data}', [CompaniesController::class, 'edit'])->name('companies.edit')->middleware('auth');
Route::post('/companies/create', [CompaniesController::class, 'create'])->name('companies.create')->middleware('auth');
Route::get('/companies/add', [CompaniesController::class, 'add'])->name('companies.add')->middleware('auth');
Route::delete('/companies/delete/{data}', [CompaniesController::class, 'delete'])->name('companies.delete')->middleware('auth');

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees')->middleware('auth');
Route::post('/employees/update/{data}', [EmployeesController::class, 'update'])->name('employees.update')->middleware('auth');
Route::get('/employees/edit/{data}', [EmployeesController::class, 'edit'])->name('employees.edit')->middleware('auth');
Route::post('/employees/create', [EmployeesController::class, 'create'])->name('employees.create')->middleware('auth');
Route::get('/employees/add', [EmployeesController::class, 'add'])->name('employees.add')->middleware('auth');
Route::delete('/employees/delete/{data}', [EmployeesController::class, 'delete'])->name('employees.delete')->middleware('auth');