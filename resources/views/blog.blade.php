@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mt-5">
            <h2>{{ $post['title'] }}</h2>
            <h6>By : {{ $post['author'] }}</h6>
            <p>{{ $post['body'] }}</p>
        </article>
    @endforeach
@endsection