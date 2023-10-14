@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ver más de {{$author->name}} {{$author->surname}}</h1>
        <label for="id" style="width: 100%" class="form-label">ID
            <br><input disabled class="form-control" type="text" name="id" id="id"
                       value="{{$author->id}}"> </label><br>

        <label for="name" style="width: 100%" class="form-label">Nombre
            <br><input disabled class="form-control" type="text" name="name" id="name"
                       value="{{$author->name}}"> </label><br>

        <label for="surname" style="width: 100%" class="form-label">Apellido
            <br>
            <input disabled class="form-control" type="text" name="surname" id="surname"
                   value="{{$author->surname}}"> </label><br>

        <label for="gender" style="width: 100%" class="form-label">Género
            <br> <input disabled class="form-control" type="text" name="gender" id="gender"
                        value="{{$author->gender}}"></label><br>

        <label for="age" style="width: 100%" class="form-label">Edad
            <br><input disabled class="form-control" type="number" name="age" id="age" value="{{$author->age}}"></label><br>
        <!--end::All to get the age-->
        <a class="btn btn-primary" href="{{route('authors.index')}}">Regresar</a>
    </div>

@endsection
