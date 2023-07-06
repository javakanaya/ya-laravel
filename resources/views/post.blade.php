@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>By: java kanaya in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    {!! $post->body !!} {{-- biar bisa tetep baca tag html --}}

    <a href="/posts">Back to Posts</a>
@endsection
