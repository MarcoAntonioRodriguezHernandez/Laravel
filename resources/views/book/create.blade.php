@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('books.store')}}" method="post">
            @csrf
            @include ('book.form', ['mode'=>'Crear'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
