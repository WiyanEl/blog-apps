@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-md-8">
      <h2>{{ $post->title }}</h2>
      <a href="{{ url('/dashboard/posts/') }}" class="btn btn-success text-light"><span data-feather="arrow-left"></span> Back to All Post</a>
      <a href="{{ url('/dashboard/posts/' . $post->slug . '/edit') }}" class="btn btn-warning text-light"><span data-feather="edit"></span> Edit</a>
      <form action="{{ url('/dashboard/posts/' . $post->slug) }}" method="POST" class="d-inline">
      @method('delete')
      @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span> Delete</button>
      </form>

      @if ($post->image)
        <div style="max-height: 300px; overflow: hidden;">
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
        </div>
      @else
        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
      @endif

      <p class="fs-5">
          {!! $post->body !!}
      </p>
    </div>
  </div>
</div>
@endsection