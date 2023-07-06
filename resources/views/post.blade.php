@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>By: <a href="" class="text-decoration-none">{{ $post->user->name }}</a> in <a
            href="/categories/{{ $post->category->slug }} "class="text-decoration-none">{{ $post->category->name }}</a></p>

    {!! $post->body !!} {{-- biar bisa tetep baca tag html --}}

    <a href="/posts" class="mt-5 pb-5 text-decoration-none">Back to Posts</a>
@endsection
