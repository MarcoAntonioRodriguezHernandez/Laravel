@extends('layouts.app')
@section('content')
    <div class="container">


        @if (Session::has('message')) <!--This is a message that show if the action was successful-->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<h1>Autores</h1>
        <a href="{{url('/authors/create')}}" class="btn btn-success">Agregar nuevo autor</a>
     <!--begin::Table-->
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surname}}</td>
                    <td>{{ $author->age}}</td>
                    <td><a href="{{route('authors.show',$author->id)}}" class="btn btn-primary">Ver más</a> |
                        <a href="{{route('authors.edit',$author->id)}}" class="btn btn-warning"> Editar </a> |

                        <form action="{{route('authors.destroy',$author->id)}}" class="d-inline" method="post">
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
            {{$authors->links()}}
    </div>
@endsection
