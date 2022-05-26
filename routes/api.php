<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController, SubscribeController,
    SubscriberController, WebsiteController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/post/create', [PostController::class, 'create']);
Route::get('/subscribe', [SubscribeController::class, 'subscribe']);
Route::get('/subscriber/create', [SubscriberController::class, 'create']);
Route::get('/website/create', [WebsiteController::class, 'create']);
