<?php
use App\Http\Controllers\SportsActivityController;
use Illuminate\Support\Facades\Route;

Route::apiResource('activities', SportsActivityController::class);