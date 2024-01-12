@extends('layouts.main')

@section('content')
    

<h1>Car</h1>

<a href="{{ route('cars.create') }}" >Add New</a>
<a href="{{ route('cars.index') }}" >Cars</a>
@endsection