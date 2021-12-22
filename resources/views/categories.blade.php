@extends('layouts.main')

@section('container')
    <h1>Post categories</h1>

    @foreach ($categories as $category)
        <ul>
            <li>
                <h2><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></h2>
            </li>
        </ul>
    @endforeach
@endsection