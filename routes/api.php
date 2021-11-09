<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [ApiController::class, 'index'])->name('api_index');
Route::get('/chapters/{word_book_id}', [ApiController::class, 'get_chapters']);
Route::get('/words/{chapter_id}', [ApiController::class, 'get_words']);
Route::get('/means/{word_id}', [ApiController::class, 'get_means']);
