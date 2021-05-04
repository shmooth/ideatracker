<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;


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


//Route::middleware('auth:api')->get('/user', function (Request $request) {
Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->get('/ideas', [IdeaController::class, 'index']); // to get all ideas (via the index() method)

/*
Route->get('/user', function (Request $request) {
    return $request->user();
});
*/



