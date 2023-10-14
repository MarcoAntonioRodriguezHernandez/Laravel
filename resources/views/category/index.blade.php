@extends('layouts.app')
@section('content')
    <div class="container">


        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

<h1>Categorías</h1>
        <a href="{{route('categories.create')}}" class="btn btn-success">Agregar nueva categoría</a>
        <!--begin::Table-->
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>Nombre de la categoría</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name}}</td>
                    <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning"> Editar </a> |

                        <form action="{{route('categories.destroy',$category->id)}}" class="d-inline"
                              method="post">
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
        {{$categories->links()}}
    </div>
@endsection
