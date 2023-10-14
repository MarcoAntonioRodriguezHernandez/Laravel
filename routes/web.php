<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BooksCategoriesController;

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
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/edit/{authors}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{authors}', [AuthorController::class, 'update'])->name('authors.update');
Route::get('/authors/showMore/{authors}', [AuthorController::class, 'show'])->name('authors.show');
Route::delete('/authors/{authors}', [AuthorController::class, 'destroy'])->name('authors.destroy');

//Book Routes
Route::get('/books', [BooksCategoriesController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksCategoriesController::class, 'create'])->name('books.create');
Route::post('/books', [BooksCategoriesController::class, 'store'])->name('books.store');
Route::get('/books/edit/{books}', [BooksCategoriesController::class, 'edit'])->name('books.edit');
Route::put('/books/{books}', [BooksCategoriesController::class, 'update'])->name('books.update');
Route::get('/books/showMore/{books}', [BooksCategoriesController::class, 'get'])->name('books.show');
Route::delete('/books/{books}', [BooksCategoriesController::class, 'destroy'])->name('books.destroy');

//Person Routes
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');
Route::get('/people/edit/{people}', [PersonController::class, 'edit'])->name('people.edit');
Route::put('/people/{people}', [PersonController::class, 'update'])->name('people.update');
Route::get('/people/showMore/{people}', [PersonController::class, 'show'])->name('people.show');
Route::delete('/people/{people}', [PersonController::class, 'destroy'])->name('people.destroy');

//Loan Routes
Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
Route::get('/loans/edit/{loan}', [LoanController::class, 'edit'])->name('loans.edit');
Route::put('/loans/{loans}', [LoanController::class, 'update'])->name('loans.update');
Route::get('/loans/showMore/{loans}', [LoanController::class, 'show'])->name('loans.show');
Route::delete('/loans/{loans}', [LoanController::class, 'destroy'])->name('loans.destroy');

//Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{categories}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categories}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
