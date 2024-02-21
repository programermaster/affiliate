<?php

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

Route::get('/affiliates_lives_within_distance_of_dublin', [\App\Http\Controllers\AffiliateController::class, 'getAffiliatesLivesWithinDistanceOfDublin']);
