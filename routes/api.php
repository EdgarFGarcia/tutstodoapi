<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/iItem', [App\Http\Controllers\API\TodoControllers::class, 'iItem']);
Route::get('/getTodos', [App\Http\Controllers\API\TodoControllers::class, 'getTodos']);
Route::delete('/deleteTodo/{id?}', [App\Http\Controllers\API\TodoControllers::class, 'deleteTodo']);
Route::patch('/editTodo', [App\Http\Controllers\API\TodoControllers::class, 'editTodo']);