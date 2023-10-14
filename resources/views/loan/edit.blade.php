@extends('layouts.app')
@section('content')
    <div class="container">
        <!--begin::Form-->
        <form action="{{route('loans.update',$loan->id)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            @include ('loan.form', ['mode'=>'Editar'])
        </form>
        <!--end::Form-->
    </div>
@endsection
