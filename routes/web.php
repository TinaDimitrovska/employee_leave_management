<?php

use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('users', [UserController::class, 'store']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('users/{user}', [UserController::class, 'update']);


    Route::get('/types', [LeaveTypeController::class, 'index']);
    Route::get('/types/create', [LeaveTypeController::class, 'create']);
    Route::post('types', [LeaveTypeController::class, 'store']);
    Route::get('/types/{leaveType}/edit', [LeaveTypeController::class, 'edit']);
    Route::put('types/{leaveType}', [LeaveTypeController::class, 'update']);
    Route::delete('types/{leaveType}', [LeaveTypeController::class, 'destroy']);
});


Route::get('/applications', [LeaveApplicationController::class, 'index'])->middleware('auth');
Route::get('/applications/create', [LeaveApplicationController::class, 'create'])->middleware('auth');
Route::post('/applications', [LeaveApplicationController::class, 'store'])->middleware('auth');
Route::get('/applications/{leaveApplication}/edit', [LeaveApplicationController::class, 'edit'])->middleware('auth');
Route::put('/applications/{leaveApplication}', [LeaveApplicationController::class, 'update'])->middleware('auth');
Route::delete('/applications/{leaveApplication}', [LeaveApplicationController::class, 'destroy'])->middleware('auth');
Route::post('/applications/{leaveApplication}/download', [LeaveApplicationController::class, 'download'])->middleware('auth');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
