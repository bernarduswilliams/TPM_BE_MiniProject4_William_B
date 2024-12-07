<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EmployeeController::class, 'welcome'])->name('welcome');

Route::get('/welcome', [EmployeeController::class, 'welcome1'])->name('welcome1');

Route::post('/store', [EmployeeController::class , 'store'])->name('store');

Route::get('/create', [EmployeeController::class, 'createEmployee'])->name('createEmployee')->middleware('isLogin');

Route::get('/edit/{id}', [EmployeeController::class, 'editEmployee'])->name('editEmployee');

Route::patch('/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee');

Route::delete('/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');
//post = msk db
//get = view
//patch = update

//authentication
Route::get('/register', [AuthController::class,'ShowRegisterForm'])->name('register');
Route::post('/register', [AuthController::class,'Register'])->name('registerStore');
Route::get('/login', [AuthController::class,'ShowLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'Login'])->name('loginStore');
Route::get('/logout', [AuthController::class,'ShowLogoutForm'])->name('logout');
Route::post('/logout', [AuthController::class,'logout'])->name('logoutStore');
