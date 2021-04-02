<?php


use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Support\Facades\Route;

//Class API route
Route::ApiResource('/class', SclassController::class);


//Subject API route
Route::ApiResource('/subject', SubjectController::class);


