<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/categories",[CategorieController::class,'index']);
Route::post("/categories",[CategorieController::class,'store']);
Route::get("/categories/{id}",[CategorieController::class,'show']);
Route::delete("/categories/{id}",[CategorieController::class,'destroy']);
Route::put("/categories/{id}",[CategorieController::class,'update']);

Route::middleware('api')->group(function () {

    Route::resource('scategories', ScategorieController::class);
    
    });
Route::get("/scategories",[ScategorieController::class,'index']);
Route::post("/scategories",[SCategorieController::class,'store']);
Route::get("/scategories/{id}",[SCategorieController::class,'show']);
Route::delete("/scategories/{id}",[SCategorieController::class,'destroy']);
Route::put("/scategories/{id}",[SCategorieController::class,'update']);
Route::get('/scat/{idcat}', [ScategorieController::class,'showSCategorieByCAT']);

use App\Http\Controllers\ArticleController;
use App\Models\Article;

Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class);
    });
    Route::get("/Article",[ArticleController::class,'index']);
    Route::post("/Article",[ArticleController::class,'store']);
    Route::get("/Article/{id}",[ArticleController::class,'show']);
    Route::delete("/Article/{id}",[ArticleController::class,'destroy']);
    Route::put("/Article/{id}",[ArticleController::class,'update']);
    Route::get("/ART/{idscat}",[ArticleController::class,'showArticlesBySCAT']);
    Route::get('/articles/art/articlespaginate', [ArticleController::class,'articlesPaginate']);
    Route::get('/articles/art/paginationPaginate', [ArticleController::class,'paginationPaginate']);