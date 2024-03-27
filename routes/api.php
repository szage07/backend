<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PromptController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//public api's

    Route::post('/login',[AuthController::class,'login'])->name('user.login'); 
    Route::post('/user',[UserController::class,'store'])->name('user.store'); 





//private api's
Route::middleware(['auth:sanctum'])->group(function() {
   
    Route::post('/logout', [AuthController::class,'logout']); 
    
    //admin api's
Route::controller(AuthController::class)->group(function () {
    Route::get('/carousel', 'index'); 
    Route::get('/carousel/{id}', 'show');  
    Route::post('/carousel', 'store'); 
    Route::put('/carousel/{id}', 'update'); 
    Route::delete('/carousel/{id}', 'destroy'); 

});

Route::get('/user',[UserController::class, 'index']); 
Route::delete('/user/{id}',[UserController::class, 'destroy']);
Route::get('/user/{id}',[UserController::class, 'show']); 
Route::put('/user/{id}',[UserController::class, 'update'])->name('user.update');
Route::put('/user/email/{id}',[UserController::class, 'email'])->name('user.email');
Route::put('/user/password/{id}',[UserController::class, 'password'])->name('user.password');
Route::post('/user',[UserController::class, 'store'])->name('user.store');
});