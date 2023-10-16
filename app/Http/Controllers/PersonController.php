<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Loan;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['people'] = Person::paginate(10);
        return view('person.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = [
            'name' => 'required|string|max:50', //Example: 'name' => 'Juan'
            'surname' => 'required|string|max:50', //Example: 'surname' => 'Perez'
            'address' => 'required|string|max:200', //Example: 'address' => 'Calle 123'
            'phone' => 'required' //Example: 'phone' => '123456789'
        ];
        $message = [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no debe exceder los 50 caracteres',
            'surname.required' => 'El apellido es requerido',
            'surname.max' => 'El apellido no debe exceder los 50 caracteres',
            'address.required' => 'La dirección es requerida',
            'address.max' => 'La dirección no debe exceder los 200 caracteres',
            'phone.required' => 'El telefono es requerido',
        ];
        $this->validate($request, $fileds, $message);

        $personData = request()->except('_token');
        Person::insert($personData);
        return redirect(route('people.index'))->with('message', 'Usuario agregado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $people = Person::findOrFail($id);
        return view('person.edit', compact('people'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view('person.show', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
        $fileds = [
            'name' => 'required|string|max:50', //Example: 'name' => 'Juan'
            'surname' => 'required|string|max:50', //Example: 'surname' => 'Perez'
            'address' => 'required|string|max:200', //Example: 'address' => 'Calle 123'
            'phone' => 'required' //Example: 'phone' => '123456789'
        ];
        $message = [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no debe exceder los 50 caracteres',
            'surname.required' => 'El apellido es requerido',
            'surname.max' => 'El apellido no debe exceder los 50 caracteres',
            'address.required' => 'La dirección es requerido',
            'address.max' => 'La dirección no debe exceder los 200 caracteres',
            'phone.required' => 'El teléfono es requerida',
        ];
        $this->validate($request,$fileds, $message);
        $peopleData = request()->except(['_token', '_method']);
        Person::where('id', '=', $id)->update($peopleData);
        $people = Person::findOrFail($id);
        return redirect(route('people.index'))->with('message', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Loan::where('person_id', '=', $id)->delete();
        Person::destroy($id);
        return redirect(route('people.index'))->with('message', 'Usuario eliminado correctamente');
    }
}
