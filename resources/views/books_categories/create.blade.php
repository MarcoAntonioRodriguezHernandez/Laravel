@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('booksCategories.store')}}" method="post">
            @csrf
            @include ('books_categories.form', ['mode'=>'Crear'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
