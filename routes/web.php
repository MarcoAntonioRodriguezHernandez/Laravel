<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\LoanController;

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

//Author Routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create',[AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors',[AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/edit/{authors}',[AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{authors}',[AuthorController::class, 'update'])->name('authors.update');
Route::get('/authors/showMore/{authors}',[AuthorController::class, 'show'])->name('authors.show');
Route::delete('/authors/{authors}',[AuthorController::class, 'destroy'])->name('authors.destroy');

//Book Routes
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create',[BookController::class, 'create'])->name('book.create');
Route::post('/books',[BookController::class, 'store'])->name('book.store');
Route::get('/books/edit/{books}',[BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{books}',[BookController::class, 'update'])->name('book.update');
Route::get('/books/showMore/{books}',[BookController::class, 'get'])->name('book.show');
Route::delete('/books/{books}',[BookController::class, 'destroy'])->name('book.destroy');

//Person Routes
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create',[PersonController::class, 'create'])->name('people.create');
Route::post('/people',[PersonController::class, 'store'])->name('people.store');
Route::get('/people/edit/{people}',[PersonController::class, 'edit'])->name('people.edit');
Route::put('/people/{people}',[PersonController::class, 'update'])->name('people.update');
Route::get('/people/showMore/{people}',[PersonController::class, 'show'])->name('people.show');
Route::delete('/people/{people}',[PersonController::class, 'destroy'])->name('people.destroy');

//Loan Routes
Route::get('/loan', [LoanController::class, 'index'])->name('loan.index');
Route::get('/loan/create',[LoanController::class, 'create'])->name('loan.create');
Route::post('/loan',[LoanController::class, 'store'])->name('loan.store');
Route::get('/loan/edit/{loan}',[LoanController::class, 'edit'])->name('loan.edit');
Route::put('/loan/{loan}',[LoanController::class, 'update'])->name('loan.update');
Route::get('/loan/showMore/{loan}',[LoanController::class, 'show'])->name('loan.show');
Route::delete('/loan/{loan}',[LoanController::class, 'destroy'])->name('loan.destroy');
