<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BookController::class, 'index']);
Route::get('/book-add', [BookController::class, 'create'])->name('book.add');
Route::post('/book-add', [BookController::class, 'store'])->name('book.store');
Route::get('/book-detail/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book-edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book-edit', [BookController::class, 'update'])->name('book.update');
Route::get('/book-delete/{id}', [BookController::class, 'destroy'])->name('book.delete');
