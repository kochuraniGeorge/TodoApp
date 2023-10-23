<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
 

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

// Route::get('/joshma', function () {
//     return view('welcome');

// });

// Route::get('/practice',function(){
//     return view("practice");
// });
// Route::get('/app', [AppController::class, 'index']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/signup', [UserController::class, 'signup']);

Route::post('/signup_complete', [UserController::class, 'mandatory'])->name("signup_off");
Route::post('/login_complete', [UserController::class, 'authenticate'])->name("login_off");
Route::get('/homePage', [UserController::class, 'homePage'])->middleware('test.auth');



Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/addTask', [TaskController::class, 'addTask'])->name('addtask');
Route::get('/myTasks',[TaskController::class, 'myTasks'])->name('myTasks')->middleware('test.auth');

Route::get('/profile', [UserController::class, 'profilePic'])->name("profile_off")->middleware('test.auth');
Route::post('/profile_pic_complete', [UserController::class, 'profileMandatory'])->name("profile_pic_complete")->middleware('test.auth');;


Route::get('/view_profile_pic', [UserController::class, 'viewProfilePic'])->name('view_profile_pic')->middleware('test.auth');


