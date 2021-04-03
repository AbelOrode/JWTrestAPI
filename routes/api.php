<?php


use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Class API route
Route::ApiResource('/class', SclassController::class);


//Subject API route
Route::ApiResource('/subject', SubjectController::class);

//Section API route
Route::ApiResource('/section', SectionController::class);

//Student API route
Route::ApiResource('/students', StudentController::class);



//JWT Authentication route
Route::group([
    'prefix' => 'auth'
], function (){

//JWT Routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
});
