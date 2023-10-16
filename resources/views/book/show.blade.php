@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ver más de {{$book->title}}</h1>
        <label for="id" style="width: 100%" class="form-label">ID
            <br><input disabled class="form-control" type="text" name="id" id="id"
                       value="{{$book->id}}"> </label><br>

        <label for="title" style="width: 100%" class="form-label">Título
            <br><input disabled class="form-control" type="text" name="title" id="title"
                       value="{{$book->title}}"> </label><br>

        <label for="editorial" style="width: 100%" class="form-label">Editorial
            <br><input disabled class="form-control" type="text" name="editorial" id="editorial"
                       value="{{$book->editorial}}"> </label><br>

        <label for="isbn" style="width: 100%" class="form-label">ISBN
            <br> <input disabled class="form-control" type="text" name="isbn" id="isbn"
                        value="{{$book->ISBN}}"></label><br>

        <label for="year_edition" style="width: 100%" class="form-label">Año de edición
            <br><input disabled class="form-control" type="date" name="year_edition" id="year_edition"
                       value="{{$book->year_edition}}"></label><br>

        <label for="author" style="width: 100%" class="form-label">Autor
            <br><input disabled class="form-control" type="text" name="author" id="author"
                       value="{{$book->author->name}} {{$book->author->surname}}"></label><br>

        <label for="categories" style="width: 100%" class="form-label">Categorias
            <br>
            @if(count($booksCategories)==0)
                <p class="form-control">No hay categorias</p>
            @else
                <p class="form-control">
                @foreach($booksCategories as $category)
                    {{$category->name}},
                @endforeach
                </p>
            @endif
        </label><br>

        <a class="btn btn-primary" href="{{route('books.index')}}">Regresar</a>
    </div>

@endsection
