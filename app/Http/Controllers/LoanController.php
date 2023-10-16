<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['loans'] = Loan::paginate(10);
        return view('loan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $people = Person::all();
        $books = Book::all();
        return view('loan.create',compact('people','books'));
    }

    public function show($id)
    {
        //
        $loan = Loan::findOrFail($id);
        return view('loan.show', compact('loan'));
    }

    /**
     * Store a newly created resource in storage.
     * @param $request | This param is to get all the data from the form and save a new one
     */
    public function store(Request $request)
    {
        //
        $fileds = [
            'date_loan' => 'required|date', //Example: 'date_loan' => '2021-05-05'
            'date_return' => 'required|date|after:date_loan', //Example: 'date_return' => '2021-05-06'
            'book_id' => 'required', //Example: 'book_id' => '1'
            'person_id' => 'required', //Example: 'person_id' => '1'
        ];
        $message = [
            'date_loan.required' => 'La fecha de prestamo es requerida',
            'date_return.required' => 'La fecha de devolución es requerida',
            'book.id.required' => 'El nombre del libro es requerido',
            'person_id.required' => 'El nombre del usuario es requerido',
        ];
        $this->validate($request, $fileds, $message);
        $loanData = request()->except('_token');
        Loan::insert($loanData);
        return redirect(route('loans.index'))->with('message', 'Prestamo agregado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id| This parameter is the id
     */
    public function edit($id)
    {
        //
        $people = Person::all();
        $books = Book::all();
        $loan = Loan::findOrFail($id);
        return view('loan.edit', compact('loan','people','books'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id| This id is used to update the data
     */
    public function update(Request $request, $id)
    {
        //
        $fileds = [
            'date_loan' => 'required|date', //Example: 'date_loan' => '2021-05-05'
            'date_return' => 'required|date|after:date_loan', //Example: 'date_return' => '2021-05-06'
            'book_id' => 'required', //Example: 'book_id' => '1'
            'person_id' => 'required', //Example: 'person_id' => '1'
        ];
        $message = [
            'date_loan.required' => 'La fecha de prestamo es requerida',
            'date_return.required' => 'La fecha de devlución es requerida',
            'book.id.required' => 'El nombre del libro es requerido',
            'person_id.required' => 'El nombre del usuario es requerido',
        ];
        $this->validate($request, $fileds, $message);

        $loanData = request()->except(['_token', '_method']);
        Loan::where('id', '=', $id)->update($loanData);

        $loan = Loan::findOrFail($id);
        return redirect(route('loans.index'))->with('message', 'Prestamo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Loan::destroy($id);
        return redirect(route('loans.index'))->with('message', 'Prestamo eliminado correctamente');
    }
}
