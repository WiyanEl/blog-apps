@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post['title'] }}</h2>
        <h6>Author : {{ $post['author'] }}</h6>
        <p>
            {{ $post['body'] }}
        </p>
    </article>
    <a href="/blog" class="btn btn-success">Kembali</a>
@endsection