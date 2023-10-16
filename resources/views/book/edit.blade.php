@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('books.update',$book->id)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            @include ('book.form', ['mode'=>'Editar'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
