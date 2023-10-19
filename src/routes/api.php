<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Auth;
use App\Jobs\Job;

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
Route::post('/auth', [Auth::class, 'post']);
Route::get('/success', function (Request $request) {
    return;
});
Route::post('/fail', function (Request $request) {
    throw new Exception('fail');
});
Route::get('/queue', function (Request $request) {
    $context = Log::sharedContext();
    Job::dispatch($context['request-id']);
    return;
});
