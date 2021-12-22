@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <p>By Wiyan Barkah Elmansyah in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        <p>
            {!! $post->body !!}
        </p>
    </article>
    <a href="/blog" class="btn btn-success">Kembali</a>
@endsection