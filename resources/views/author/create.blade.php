@extends('layouts.app')
@section('content')

    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('authors.store')}}" method="post">
            @csrf
            @include ('author.form', ['mode'=>'Crear'])
        </form>
        <!-- end::Form -->
    </div>

@endsection
