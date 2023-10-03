<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/register',[UserController::class,'showRegister'])->name('register');
Route::post('/register',[UserController::class,'register']);

Route::middleware('auth')->group(function(){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('logout',[UserController::class,'logout'])->name('user.logout');
});

Route::get('/login',[UserController::class,'showLogin'])->name('login');

Route::post('/login',[UserController::class,'login']);

Route::get('/bookRegister',[BookController::class,'showbookRegister'])->name('bookRegister');
Route::post('/bookRegister',[BookController::class,'bookRegister']);

Route::get('/bookErase',[BookController::class,'showbookErase'])->name('bookErase');
Route::post('/bookErase',[BookController::class,'showbookErase']);
Route::post('/bookDelete',[BookController::class,'bookDelete']); 


Route::get('/bookIndex',[BookController::class,'bookIndex'])->name('bookIndex');

Route::post('/bookRecommend',[BookController::class,'bookRecommend']);