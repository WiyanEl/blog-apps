@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>
<div class="table-responsive col-lg-10">
  <a href="{{ url('dashboard/posts/create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> New Post</a>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="{{ url('/dashboard/posts/' . $post->slug) }}" class="badge bg-info text-light"><span data-feather="eye"></span></a>
            <a href="{{ url('/dashboard/posts/' . $post->slug . '/edit') }}" class="badge bg-warning text-light"><span data-feather="edit"></span></a>
            <form action="{{ url('/dashboard/posts/' . $post->slug) }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          Post not Found!
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection

