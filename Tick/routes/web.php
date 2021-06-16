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
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/register/personal-information', [App\Http\Controllers\UserController::class, 'index'])->name('form');
Route::post('/register/personal-information', [App\Http\Controllers\UserController::class, 'store'])->name('form');

Route::get('/planner', [App\Http\Controllers\PlannerController::class, 'index'])->name('planner');

Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes');
Route::post('/themes/buy', [App\Http\Controllers\ThemeController::class, 'buytheme'])->name('buytheme');
Route::get('/themes/equip', [App\Http\Controllers\ThemeController::class, 'equiptheme'])->name('equiptheme');


Route::get('/todolist', [App\Http\Controllers\ToDoListController::class, 'index'])->name('todolist');
Route::get('seeTask', [App\Http\Controllers\TodolistController::class, 'seeTask'])->name('seeTask');
Route::get('deleteList/{task_id}', [App\Http\Controllers\ToDoListController::class, 'deleteList'])->name('deleteList');
Route::get('deleteListHome/{task_id}', [App\Http\Controllers\ToDoListController::class, 'deleteListHome'])->name('deleteListHome');
Route::post('editList', [App\Http\Controllers\ToDoListController::class, 'editList'])->name('editList');

Route::post('/todolist-editTask', [App\Http\Controllers\ToDoListController::class, 'editTask'])->name('todolist-editTask');

Route::get('/todolist-add', [App\Http\Controllers\ToDoListController::class, 'showaddList'])->name('todolist-add');
Route::post('/todolist-add',[App\Http\Controllers\ToDoListController::class, 'createList'])->name('todolist-add.createList');
Route::get('/todolist-add-task/{task_id}', [App\Http\Controllers\ToDoListController::class, 'showaddTask'])->name('showaddTask');
Route::post('/todolist-add-home',[App\Http\Controllers\ToDoListController::class, 'createListHome'])->name('todolist-add.createListHome');

Route::post('/todolist-add-task', [App\Http\Controllers\ToDoListController::class, 'createTask'])->name('todolist-add-task.createTask');
Route::post('/todolist-add-task-insidelist', [App\Http\Controllers\ToDoListController::class, 'createTaskInsideList'])->name('todolist-add-task-insidelist.createTaskInsideList');
Route::post('/todolist-update-task', [App\Http\Controllers\ToDoListController::class, 'updateTask'])->name('todolist-add-task.updateTask');

Route::post('/todolist', [App\Http\Controllers\ToDoListController::class, 'deleteTask'])->name('todolist-deleteTask');
Route::post('finishTask/{task_id}', [App\Http\Controllers\ToDoListController::class, 'finishTask'])->name('todolist-finishTask');

Route::post('markAsDone/{tasks_id}', [App\Http\Controllers\ToDoListController::class, 'markAsDone'])->name('todolist-markAsDone');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');


//Dummy Routes - Change to connect back-end to front-end

Route::get('todolist/{list_id}', [App\Http\Controllers\ToDoListController::class, 'showListContent'])->name('todolist-tasks');

