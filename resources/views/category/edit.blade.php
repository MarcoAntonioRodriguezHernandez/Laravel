@extends('layouts.app')
@section('content')
    <div class="container">
        <!--begin::Form-->
        <form action="{{route('categories.update',$category->id)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            @include ('Category.form', ['mode'=>'Editar'])
        </form>
        <!--end::Form-->
    </div>
@endsection
