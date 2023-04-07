<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// My API


// GET       /authors
// POST      /authors
// GET       /authors/{author}
// PUT|PATCH /authors/{author}
// DELETE    /authors/{author}

// GET       /authors/{author}/books
// GET       /authors/{author}/books/{book}
// POST      /authors/{author}/books

// GET       /books
// POST      /books
// GET       /books/{book}
// PUT|PATCH /books/{book}
// DELETE    /books/{book}
