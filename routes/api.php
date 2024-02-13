<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
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
Route::middleware(['auth:sanctum'])->group(function () {
   
    Route::post('/logout', [AuthController::class,'logout']); 
    
    //admin api's
Route::controller(AuthController::class)->group(function () {
    Route::get('/carousel', 'index'); 
    Route::get('/carousel/{id}', 'show');  
    Route::post('/carousel', 'store'); 
    Route::put('/carousel/{id}', 'update'); 
    Route::delete('/carousel/{id}', 'destroy'); 

});

Route::controller(UserController::class)->group(function () {
Route::get('/user', 'index'); 
Route::delete('/user/{id}', 'destroy');
Route::get('/user/{id}', 'show'); 
Route::put('/user/{id}', 'update')->name('user.update');
Route::put('/user/email/{id}', 'email')->name('user.email');
Route::put('/user/password/{id}', 'password')->name('user.password');
Route::put('/user/image/{id}', 'image')->name('user.image');


});

//user specific api's
Route:: get('/profile/show',[ProfileController::class ,'show']);
Route::put('/profile/image',[ProfileController::class ,'image'])->name('profile.image');

});



