@extends('layouts.main')

@section('content')
    

<h1>Create car</h1>

<a href="{{ route('cars.index') }}" >Cars</a>
<a href="{{ route('cars.show', 1) }}" >show</a>
@endsection