<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [HomeController::class, 'index'])->name('index');

Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/create', [HomeController::class, 'create_word_book'])->name('create_word_book');
// Route::post('/create', [HomeController::class, 'create_chapter'])->name('create_chapter');
// Route::post('/create', [HomeController::class, 'create_word'])->name('create_word');

Route::get('/edit/{word_book_id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/edit', [HomeController::class, 'update'])->name('update');


Route::get('/cword/{chapter_id}', [HomeController::class, 'cword'])->name('word_index');
Route::post('/cword/{chapter_id}', [HomeController::class, 'postword'])->name('cword');
