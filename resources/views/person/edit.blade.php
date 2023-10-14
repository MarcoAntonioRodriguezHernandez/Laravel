@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('people.update',$people->id)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            @include ('person.form', ['mode'=>'Editar'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
