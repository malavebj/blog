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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('posts',[App\Http\Controllers\PagesController::class, 'home']);
Route::get('blog/{post}',[App\Http\Controllers\PostsController::class, 'show']);
Route::get('/categories/{category}',[App\Http\Controllers\CategoriesController::class, 'show']);
Route::get('/tags/{tag}',[App\Http\Controllers\TagsController::class, 'show']);
Route::get('archive',[App\Http\Controllers\PagesController::class, 'archive']);

Route::post('message',function(){
    return response()->json([
        'status'=>'OK'
    ]);
});
