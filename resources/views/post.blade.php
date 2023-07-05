@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        {!! $post->body !!} {{-- biar bisa tetep baca tag html --}}
    </article>
    <a href="/posts">Back to Posts</a>
@endsection
