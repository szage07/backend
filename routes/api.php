<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
});

Route::get('/carousel',[CarouselController::class, 'index']); 
Route::get('/carousel/{id}',[CarouselController::class, 'show']);  
Route::post('/carousel',[CarouselController::class, 'store']); 
Route::put('/carousel/{id}',[CarouselController::class, 'update']); 
Route::delete('/carousel/{id}',[CarouselController::class, 'destroy']); 


Route::get('/user',[UserController::class, 'index']); 
Route::delete('/user/{id}',[UserController::class, 'destroy']);
Route::get('/user/{id}',[UserController::class, 'show']); 
Route::put('/user/{id}',[UserController::class, 'update'])->name('user.update');
Route::put('/user/email/{id}',[UserController::class, 'email'])->name('user.email');
Route::put('/user/password/{id}',[UserController::class, 'password'])->name('user.password');
Route::post('/user',[UserController::class, 'store'])->name('user.store'); 


//student
Route::get('/student',[StudentController::class, 'index']); 
Route::get('/student/{id}',[StudentController::class, 'show']);  
Route::post('/student',[StudentController::class, 'store']); 
Route::put('/student/{id}',[StudentController::class, 'update']); 
Route::delete('/student/{id}',[StudentController::class, 'destroy']); 

