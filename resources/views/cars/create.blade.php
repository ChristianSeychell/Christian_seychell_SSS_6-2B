@extends('layouts.main')

@section('content')
    

<h1>Create car</h1>
<form action="{{ route('cars.store') }}" method="POST">
    @csrf
    @include('cars.form')
</form>

@endsection