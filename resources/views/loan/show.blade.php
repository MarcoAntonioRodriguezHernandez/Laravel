@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ver más del préstamo del día {{$loan->date_loan}}</h1>
        <label for="id" style="width: 100%" class="form-label">ID
            <br><input disabled class="form-control" type="text" name="id" id="id"
                       value="{{$loan->id}}"> </label><br>

        <label for="date_loan" style="width: 100%" class="form-label">Fecha de prestamo
            <br><input disabled class="form-control" type="date" name="date_loan" id="date_loan"
                       value="{{$loan->date_loan}}"> </label><br>

        <label for="date_return" style="width: 100%" class="form-label">Fecha de devolución
            <br><input disabled class="form-control" type="date" name="date_return" id="date_return"
                   value="{{$loan->date_return}}"> </label><br>

        <label for="year_edition" style="width: 100%" class="form-label">Pestatario
            <br><input disabled class="form-control" type="text" name="author" id="author" value="{{$loan->person->name}} {{$loan->person->surname}}"></label><br>
        <!--end::All to get the person_id-->
        <!--begin::All to get the book_id-->
        <label for="year_edition" style="width: 100%" class="form-label">Libro
            <br><input disabled class="form-control" type="text" name="book" id="book" value="{{$loan->book->title}}"></label><br>

        <a class="btn btn-primary" href="{{route('loans.index')}}">Regresar</a>
    </div>

@endsection
