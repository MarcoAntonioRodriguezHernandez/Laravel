@if ($mode == 'Crear')
    <h1>{{$mode}} Prestamo</h1>
@else
    <h1>{{$mode}} prestamo del día {{$loan->date_loan}}</h1>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error )
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif
<!--begin::All to get the date_loan-->
<label for="date_loan" style="width: 100%" class="form-label">Fecha de prestamo
    <br><input class="form-control" type="date" name="date_loan" id="date_loan"
               value="{{ isset($loan->date_loan)? $loan->date_loan:old('date_loan')}}"> </label><br>
<!--end::All to get the date_loan-->
<!--begin::All to get the date_return-->
<label for="date_return" style="width: 100%" class="form-label">Fecha de devolucion
    <br><input class="form-control" type="date" name="date_return" id="date_return"
               value="{{isset($loan->date_return)? $loan->date_return:old('date_return')}}"> </label><br>
<!--end::All to get the date_return-->
<!--begin::All to get the person_id-->
<label for="person_id" style="width: 100%" class="form-label">Nombre del prestatario
    <br><select class="form-control" name="person_id" id="person_id">
        <option value="">-- Seleccione un usuario --</option>
        @foreach($people as $person)
            <option
                value="{{ $person->id }}" {{ isset($loan) && $loan->person_id == $person->id ? 'selected' : '' }}>
                {{ $person->name }} {{ $person->surname }}
            </option>
        @endforeach
    </select></label><br>
<!--end::All to get the person_id-->
<!--begin::All to get the book_id-->
<label for="book_id" style="width: 100%" class="form-label">Nombre del libro
    <br>
    <select class="form-control" name="book_id" id="book_id">
        <option value="">-- Seleccione un libro --</option>
        @foreach($books as $book)
            <option
                value="{{ $book->id }}" {{ isset($loan) && $loan->book_id == $book->id ? 'selected' : '' }}>
                {{ $book->title }}
            </option>
        @endforeach
    </select>
</label><br>
<!--end::All to get the book_id-->
<br><input class="btn btn-success" type="submit" value="{{$mode}} Registro">
<a class="btn btn-primary" href="{{route('loans.index')}}">Regresar</a>
