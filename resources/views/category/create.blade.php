@extends('layouts.app')
@section('content')
    <div class="container">
        <!--begin::Form-->
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            @include ('category.form', ['mode'=>'Crear'])
        </form>
        <!--end::Form-->
    </div>
@endsection
