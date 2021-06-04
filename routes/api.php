<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ManufacturerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// user controller routes
Route::post("register", [UserController::class, "register"]);

Route::post("login", [UserController::class, "login"]);
Route::get("posts", [PostController::class, "index"]);
Route::post("upload_file", [DocumentController::class, "uploadAndStore"]);

// sanctum auth middleware routes

Route::middleware('auth:api')->group(function() {

    Route::get("user", [UserController::class, "user"]);

    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('comments', CommentController::class);
    Route::post("documents", [DocumentController::class, "getDocuments"]);
    Route::resource('brands', BrandController::class)->except(['create']);
    Route::resource('manufacturers', ManufacturerController::class)->except(['create']);

});