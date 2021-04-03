<?php


use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;

use Illuminate\Support\Facades\Route;

//Class API route
Route::ApiResource('/class', SclassController::class);


//Subject API route
Route::ApiResource('/subject', SubjectController::class);

//Section API route
Route::ApiResource('/section', SectionController::class);

//Student API route
Route::ApiResource('/students', StudentController::class);
