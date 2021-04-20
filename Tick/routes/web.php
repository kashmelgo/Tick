<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form', [App\Http\Controllers\UserController::class, 'index'])->name('form');
Route::post('/form', [App\Http\Controllers\UserController::class, 'store'])->name('form');

Route::get('/planner', [App\Http\Controllers\PlannerController::class, 'index'])->name('planner');
Route::get('/planner-weekly', [App\Http\Controllers\PlannerController::class, 'weekly'])->name('planner-weekly');
Route::get('/planner-monthly', [App\Http\Controllers\PlannerController::class, 'monthly'])->name('planner-monthly');

Route::get('/todolist', [App\Http\Controllers\ToDoListController::class, 'index'])->name('todolist');
Route::get('/todolist-weekly', [App\Http\Controllers\ToDoListController::class, 'weekly'])->name('todolist-weekly');
Route::get('/todolist-monthly', [App\Http\Controllers\ToDoListController::class, 'monthly'])->name('todolist-monthly');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');