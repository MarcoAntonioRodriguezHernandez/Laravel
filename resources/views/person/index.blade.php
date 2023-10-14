@extends('layouts.app')
@section('content')
    <div class="container">


        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>Usuarios</h1>
        <a href="{{route('people.create')}}" class="btn btn-success">Agregar nuevo Usuario</a>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->surname}}</td>
                    <td>{{ $person->address}}</td>
                    <td>{{ $person->phone}}</td>
                    <td><a href="{{route('people.show',$person->id)}}" class="btn btn-primary">Ver más</a> |
                        <a href="{{route('people.edit',$person->id)}}" class="btn btn-warning"> Editar </a> |

                        <form action="{{route('people.destroy',$person->id)}}" class="d-inline" method="post">
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
        {{$people->links()}}

    </div>
@endsection
