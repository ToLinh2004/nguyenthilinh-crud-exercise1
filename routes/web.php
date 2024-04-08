<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentmanagementController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student-management',[StudentmanagementController::class,'getAllStudent'])->name('allStudent');

Route::get('/add',[StudentmanagementController::class,'addStudent'])->name('addStudent');
Route::post('/add',[StudentmanagementController::class,'postStudent'])->name('postAddStudent');

Route::get('/delete/{id}',[StudentmanagementController::class,'deleteStudent'])->name('deleteStudent');

Route::get('/update/{id}',[StudentmanagementController::class,'getDetailStudent'])->name('getDetailStudent');

Route::post('/update',[StudentmanagementController::class,'postUpdateStudent'])->name('postUpdateStudent');
