<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

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

Route::get('/employee', [employeeController::class, 'index']);
Route::get('/employee/create', [employeeController::class, 'create']);
Route::post('/employee/store', [employeeController::class, 'store']);
Route::get('/employee/{id}/{nama}', [employeeController::class, 'show']);
Route::get('/employee/{id}/{nama}/edit', [employeeController::class, 'edit']);
Route::post('/employee/{id}/update', [employeeController::class, 'update']);
Route::delete('/employee/{id}/delete', [employeeController::class, 'destroy']);
