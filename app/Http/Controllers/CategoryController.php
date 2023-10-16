<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Books_Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::paginate(10);
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = [
            'name' => 'required|string|max:50', //Example: 'name' => 'Juan'
        ];
        $message = [
            'name.required' => 'La categoria es requerido',
            'name.max' => 'La categoria no debe exceder los 50 caracteres',
        ];
        $this->validate($request, $fileds, $message);

        $categoryData = request()->except('_token');
        Category::insert($categoryData);
        return redirect(route('categories.index'))->with('message', 'Categoria agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $fileds = [
            'name' => 'required|string|max:50', //Example: 'name' => 'Juan'
        ];
        $message = [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no debe exceder los 50 caracteres',
        ];
        $this->validate($request,$fileds, $message);
        $categoryData = request()->except(['_token', '_method']);
        Category::where('id', '=', $id)->update($categoryData);
        $category = Category::findOrFail($id);
        return redirect(route('categories.index'))->with('message', 'Categoría actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Books_Categories::where('category_id', '=', $id)->delete();
        Category::destroy($id);
        return redirect(route('categories.index'))->with('message', 'Categoria eliminado correctamente');
    }
}
