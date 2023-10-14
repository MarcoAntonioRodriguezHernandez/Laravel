@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- begin::Form -->
        <form action="{{route('authors.update',$author->id)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            @include ('author.form', ['mode'=>'Editar'])
        </form>
        <!-- end::Form -->
    </div>
@endsection
