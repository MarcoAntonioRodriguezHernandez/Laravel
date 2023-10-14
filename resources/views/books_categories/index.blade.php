@extends('layouts.app')
@section('content')
    <div class="container">


        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>Libros</h1>
        <a href="{{route('books.create')}}" class="btn btn-success">Agregar nuevo libro</a>
        <!--begin::Table-->
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>Id Libro</th>
                <th>Titulo</th>
                <th>Editorial</th>
                <th>Año de edición</th>
                <th>ISBN</th>
                <th>Categoria</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->editorial}}</td>
                    <td>{{ $book->year_edition}}</td>
                    <td>{{ $book->ISBN}}</td>
                    <td>{{ $book->category->name}}</td>
                    <td>{{ $book->author->name}}  {{ $book->author->surname }}</td>
                    <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-warning"> Editar </a> |

                        <form action="{{route('books.destroy',$book->id)}}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit"
                                   onclick="return confirm('¿Deseas borrar totalmente el registro?')"
                                   value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--end::Table-->
        {{$books->links()}}
    </div>
@endsection
