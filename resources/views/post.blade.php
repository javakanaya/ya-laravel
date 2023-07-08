@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>
        By: 
        <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
        in 
        <a href="/categories/{{ $post->category->slug }} "class="text-decoration-none">{{ $post->category->name }}</a>
    </p>

    {!! $post->body !!} {{-- biar bisa tetep baca tag html --}}

    <p><a href="/posts" class="mt-5 pb-5 text-decoration-none">Back to Posts</a></p>
@endsection
