<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Books_Categories;
use App\Models\Loan;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['books'] = Book::paginate(10);
        return view('book.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = [
            'title' => 'required|string|max:50', //Example: 'title' => 'Caperucita Roja'
            'editorial' => 'required|string|max:50', //Example: 'editorial' => 'Editorial Santillana'
            'year_edition' => 'required', //Example: 'year_edition' => '2021-05-05'
            'isbn' => 'required', //Example: 'isbn' => '123456789'
            'author_name' => 'required|integer|exists:authors,id' //Example: 'author_name' => 'Charles Perrault'
        ];
        $message = [
            'title.required' => 'El titulo es requerido',
            'title.max' => 'El titulo no debe exceder los 50 caracteres',
            'editorial.required' => 'La editorial es requerida',
            'editorial.max' => 'La editorial no debe exceder los 50 caracteres',
            'year_edition.required' => 'La fecha de edición es requerida',
            'isbn.required' => 'El ISBN es requerido',
            'author_name.required' => 'El autor es requerido',
        ];
        $this->validate($request, $fileds, $message);

        $bookData = request()->except('_token');
        Book::insert($bookData);
        return redirect(route('books.index'))->with('message', 'Libro agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $categoriesData = Category::all();
        foreach ($categoriesData as $category) {
            $categories[$category->id] = $category;
        }

        $booksCategories = [];
        $booksCategoriesData = Books_Categories::all();
        foreach ($booksCategoriesData as $bookCategory){
            if ($bookCategory->book_id == $id) {
                $booksCategories[] = $categories[$bookCategory->category_id];
            }
        }
        return view('book.show', compact('book', 'booksCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $fileds = [
            'title' => 'required|string|max:50', //Example: 'title' => 'Caperucita Roja'
            'editorial' => 'required|string|max:50', //Example: 'editorial' => 'Editorial Santillana'
            'year_edition' => 'required', //Example: 'year_edition' => '2021-05-05'
            'isbn' => 'required', //Example: 'isbn' => '123456789'
            'author_name' //Example: 'author_name' => 'Charles Perrault'
        ];
        $message = [
            'title.required' => 'El titulo es requerido',
            'title.max' => 'El titulo no debe exceder los 50 caracteres',
            'editorial.required' => 'La editorial es requerida',
            'editorial.max' => 'La editorial no debe exceder los 50 caracteres',
            'year_edition.required' => 'La fecha de edición es requerida',
            'isbn.required' => 'El ISBN es requerido',
            'author_name.required' => 'El autor es requerido',
        ];
        $this->validate($request, $fileds, $message);
        $bokData = request()->except(['_token', '_method']);
        Book::where('id', '=', $id)->update($bokData);
        $book = Book::findOrFail($id);
        return redirect(route('books.index'))->with('message', 'Libro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Loan::where('book_id', '=', $id)->delete();
        Book::destroy($id);
        return redirect(Route('books.index'))->with('message',
            'Libro eliminado correctamente');
    }
}
