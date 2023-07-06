@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Halaman About</h1>
    <h2>{{ $name }}</h2>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="Anjing" width="200" class="img-thumbnail rounded-circle">
@endsection

