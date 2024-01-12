@extends('layouts.main')

@section('content')
    

<h1>All Cars</h1>

@include('cars.filter')

<a href="{{ route('cars.create') }}" >Add New</a>
<a href="{{ route('cars.show', 1) }}" >show</a>

@endsection