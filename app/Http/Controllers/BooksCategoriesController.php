<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books_Categories;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class BooksCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $data['books'] = Book::query()->paginate(10);
        return view('books_categories.index', $data,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books_categories.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Books_Categories $books_Categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books_Categories $books_Categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books_Categories $books_Categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books_Categories $books_Categories)
    {
        //
    }
}
