@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('people.store')}}" method="post">
            @csrf
            @include ('person.form', ['mode'=>'Crear'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
