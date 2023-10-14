<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Books_Categories;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::query()->paginate(10);
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $authorData = new Author;
        $authorData->name = $request->name; //Example of recived data: 'Juan'
        $authorData->surname = $request->surname; //Example of recived data: 'Perez'
        $authorData->gender = $request->gender; //Example of recived data: 'Hombre'
        $authorData->age = $request->age; //Example of recived data: 20
        $data = [
            'message' => 'Autor agregado correctamente',
            'author' => $authorData
        ];
        $authorData = request()->except('_token');
        Author::insert($authorData);
        $jsonResponse = $request->jsonResponse;
        if($jsonResponse === 1){
            return response()->json($data);

        }else{
            return redirect(route('authors.index'))->with('message', 'Autor agregado correctamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $authorData = Author::findOrFail($id);
        $authorData->name = $request->name; //Example of recived data: 'Juan'
        $authorData->surname = $request->surname; //Example of recived data: 'Perez'
        $authorData->gender = $request->gender; //Example of recived data: 'Hombre'
        $authorData->age = $request->age; //Example of recived data: 20
        $authorData = request()->except(['_token', '_method']);
        Author::where('id', '=', $id)->update($authorData);
        return redirect(route('authors.index'))->with('message', 'Autor actulizado correctamente');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Book::where('author_id', '=', $id)->delete();
        Author::destroy($id);
        return redirect(route('authors.index'))->with('message', 'Autor eliminado correctamente');
    }
}
