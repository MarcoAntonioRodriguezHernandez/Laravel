@extends('layouts.app')
@section('content')
    <div class="container">


        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Categorias de Libro</h1>
        <a href="{{route('booksCategories.create')}}" class="btn btn-success">Agregar nueva relacion</a>
        <!--begin::Table-->
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>Libro</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($booksCategories as $book)
                <tr>
                    <td>{{ $books[$book->book_id]->title }}</td>
                    <td>{{ $categories[$book->category_id]->name}}</td>

                    <td><a href="{{route('booksCategories.edit',$book->id)}}" class="btn btn-warning"> Editar </a> |

                        <form action="{{route('booksCategories.destroy',$book->id)}}" class="d-inline" method="post">
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
        {{$booksCategories->links()}}
    </div>
@endsection
