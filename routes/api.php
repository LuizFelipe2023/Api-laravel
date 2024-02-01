<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

Route::get('/',[NoteController::class,'index']);
Route::get('/{id}',[NoteController::class,'show']);
Route::post('/create',[NoteController::class,'store']);
Route::put('/edit/{id}',[NoteController::class,'update']);
Route::delete('/delete/{id}',[NoteController::class,'destroy']);