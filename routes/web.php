<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'view_list']);
Route::get('/trashed', [UserController::class, 'trashed']);

Route::get('/add_user', [UserController::class, 'add_user']);
Route::post('/add_user', [UserController::class, 'create_user']);

Route::get('edit_user/{id}', [UserController::class, 'edit_user']);
Route::post('update_user/{id}', [UserController::class, 'update_user']);

Route::get('view_user/{id}', [UserController::class, 'view_user']);

Route::get('delete_user/{id}', [UserController::class, 'delete_user']);
Route::get('permanent_delete_user/{id}', [UserController::class, 'permanent_delete_user']);
Route::get('restore_user/{id}', [UserController::class, 'restore_user']);