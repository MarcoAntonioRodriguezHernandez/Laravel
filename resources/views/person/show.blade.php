@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ver más de {{$person->name}} {{$person->surname}}</h1>
        <label for="id" style="width: 100%" class="form-label">ID
            <br><input disabled class="form-control" type="text" name="id" id="id"
                       value="{{$person->id}}"> </label><br>

        <label for="name" style="width: 100%" class="form-label">Nombre
            <br><input disabled class="form-control" type="text" name="name" id="name"
                       value="{{$person->name}}"> </label><br>

        <label for="surname" style="width: 100%" class="form-label">Apellido
            <br>
            <input disabled class="form-control" type="text" name="surname" id="surname"
                   value="{{$person->surname}}"> </label><br>

        <label for="gender" style="width: 100%" class="form-label">Dirección
            <br> <input disabled class="form-control" type="text" name="gender" id="gender"
                        value="{{$person->address}}"></label><br>

        <label for="age" style="width: 100%" class="form-label">Teléfono
            <br><input disabled class="form-control" type="number" name="age" id="age" value="{{$person->phone}}"></label><br>
        <!--end::All to get the age-->
        <a class="btn btn-primary" href="{{route('people.index')}}">Regresar</a>
    </div>

@endsection
