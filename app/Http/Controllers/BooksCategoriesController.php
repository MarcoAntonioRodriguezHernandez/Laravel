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
        $booksCategories = Books_Categories::paginate(10);
        $books = [];
        $booksData = Book::all();
        foreach($booksData as $book) $books[$book->id] = $book;
        $categoriesData = Category::all();
        foreach($categoriesData as $category) $categories[$category->id] = $category;

        return view('books_categories.index', compact('booksCategories', 'books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('books_categories.create', compact('books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = [
            'book_id' => 'required', //Example: 'book_id' => '1'
            'category_id' => 'required', //Example: 'category_id' => '1'
        ];
        $message = [
            'book_id.required' => 'El nombre del libro es requerido',
            'category_id.required' => 'El nombre de la categoria es requerido',
        ];
        $this->validate($request, $fileds, $message);
        $booksCategoriesData = request()->except('_token');
        Books_Categories::insert($booksCategoriesData);
        return redirect()->route('booksCategories.index')->with('success', '¡La categoria del libro se ha registrado con éxito!');
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
    public function edit($id)
    {
        $books = Book::all();
        $categories = Category::all();
        $booksCategories = Books_Categories::findOrFail($id);
        return view('books_categories.edit', compact('books', 'categories', 'booksCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $fileds = [
            'book_id' => 'required', //Example: 'book_id' => '1'
            'category_id' => 'required', //Example: 'category_id' => '1'
        ];
        $message = [
            'book_id.required' => 'El nombre del libro es requerido',
            'category_id.required' => 'El nombre de la categoria es requerido',
        ];
        $this->validate($request, $fileds, $message);
        $booksCategoriesData = request()->except('_token', '_method');
        Books_Categories::where('id', '=', $id)->update($booksCategoriesData);
        return redirect()->route('booksCategories.index')->with('success', '¡La categoria del libro se ha actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Books_Categories::destroy($id);
        return redirect()->route('booksCategories.index')->with('success', '¡La categoria del libro se ha eliminado con éxito!');
    }
}
