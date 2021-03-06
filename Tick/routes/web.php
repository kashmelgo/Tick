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

 Route::resource('planner', 'App\Http\Controllers\PlannerController');

Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes');
Route::post('/themes/buy', [App\Http\Controllers\ThemeController::class, 'buytheme'])->name('buytheme');
Route::get('/themes/equip', [App\Http\Controllers\ThemeController::class, 'equiptheme'])->name('equiptheme');


Route::get('/todolist', [App\Http\Controllers\ToDoListController::class, 'index'])->name('todolist');
Route::get('seeTask', [App\Http\Controllers\TodolistController::class, 'seeTask'])->name('seeTask');
Route::get('deleteList', [App\Http\Controllers\ToDoListController::class, 'deleteList'])->name('deleteList');
Route::get('renameList', [App\Http\Controllers\ToDoListController::class, 'renameList'])->name('renameList');
Route::get('deleteListHome/{task_id}', [App\Http\Controllers\ToDoListController::class, 'deleteListHome'])->name('deleteListHome');
Route::post('editList', [App\Http\Controllers\ToDoListController::class, 'editList'])->name('editList');

Route::post('/todolist-editTask', [App\Http\Controllers\ToDoListController::class, 'editTask'])->name('todolist-editTask');

Route::get('/todolist-add', [App\Http\Controllers\ToDoListController::class, 'showaddList'])->name('todolist-add');
Route::post('/todolist-add',[App\Http\Controllers\ToDoListController::class, 'createList'])->name('todolist-add.createList');
Route::get('/todolist-add-task/{task_id}', [App\Http\Controllers\ToDoListController::class, 'showaddTask'])->name('showaddTask');
Route::post('/todolist-add-home',[App\Http\Controllers\ToDoListController::class, 'createListHome'])->name('todolist-add.createListHome');

Route::post('/todolist-add-task', [App\Http\Controllers\ToDoListController::class, 'createTask'])->name('todolist-add-task.createTask');
Route::post('/todolist-new-task', [App\Http\Controllers\ToDoListController::class, 'newTask'])->name('todolist-new-task.newTask');
Route::post('/todolist-add-task-insidelist', [App\Http\Controllers\ToDoListController::class, 'createTaskInsideList'])->name('todolist-add-task-insidelist.createTaskInsideList');
Route::post('/todolist-update-task', [App\Http\Controllers\ToDoListController::class, 'updateTask'])->name('todolist-add-task.updateTask');

Route::post('/todolist', [App\Http\Controllers\ToDoListController::class, 'deleteTask'])->name('todolist-deleteTask');
Route::post('finishTask/{task_id}', [App\Http\Controllers\ToDoListController::class, 'finishTask'])->name('todolist-finishTask');

Route::post('markAsDone/{tasks_id}', [App\Http\Controllers\ToDoListController::class, 'markAsDone'])->name('todolist-markAsDone');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');

Route::get('todolist/{list_id}', [App\Http\Controllers\ToDoListController::class, 'showListContent'])->name('todolist-tasks');

//Admin Routes

Route::get('admin-dashboard', [App\Http\Controllers\HomeController::class, 'admin-dashboard'])->name('admin-dashboard');
Route::get('admin-users', [App\Http\Controllers\AdminController::class, 'viewUsers'])->name('admin-users');
Route::get('admin-todolists', [App\Http\Controllers\AdminController::class, 'viewTodolists'])->name('admin-todolists');
Route::get('admin-planners', [App\Http\Controllers\AdminController::class, 'viewPlanners'])->name('admin-planners');
Route::get('admin-themes', [App\Http\Controllers\AdminController::class, 'viewThemes'])->name('admin-themes');

Route::post('admin-users', [App\Http\Controllers\AdminController::class, 'createAdmin'])->name('adminUsers.createAdmin');
Route::get('admin-users/searchUsers', [App\Http\Controllers\AdminController::class, 'searchUsers'])->name('searchUsers');
Route::post('admin-users/editUser/{id}',[App\Http\Controllers\AdminController::class, 'editUser'])->name('editUser');
Route::delete('admin-users/deleteUser/{id}',[App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');

Route::delete('admin-todolists/deleteList/{id}',[App\Http\Controllers\AdminController::class, 'deleteList'])->name('deleteList');
Route::get('admin-users/searchLists', [App\Http\Controllers\AdminController::class, 'searchLists'])->name('searchLists');

Route::post('admin-themes/createTheme', [App\Http\Controllers\AdminController::class, 'createTheme'])->name('createTheme');
Route::get('admin-themes/searchThemes', [App\Http\Controllers\AdminController::class, 'searchThemes'])->name('searchThemes');
Route::delete('admin-themes/deleteTheme/{id}',[App\Http\Controllers\AdminController::class, 'deleteTheme'])->name('deleteTheme');
Route::post('admin-themes/editTheme/{id}', [App\Http\Controllers\AdminController::class, 'editTheme'])->name('editTheme');
