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

Route::get('/post/list', [PostController::class, 'list']);
Route::get('/subscribe/list', [SubscribeController::class, 'list']);
Route::get('/subscriber/list', [SubscriberController::class, 'list']);
Route::get('/website/list', [WebsiteController::class, 'list']);

Route::get('/post/create', [PostController::class, 'create']);
Route::get('/subscribe', [SubscribeController::class, 'subscribe']);
Route::get('/subscriber/create', [SubscriberController::class, 'create']);
Route::get('/website/create', [WebsiteController::class, 'create']);
