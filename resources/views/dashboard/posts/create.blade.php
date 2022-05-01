@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Post</h1>
</div>
<div class="col-lg-8">
  <form action="{{ url('/dashboard/posts') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required autofocus value="{{ old('title') }}">
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{ old('slug') }}">
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Categori</label>
      <select class="form-select" name="category_id" id="category">
        <option>-- Select Category --</option>
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>    
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>    
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Input Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
        <p class="text-danger">
          <small>{{ $message }}</small>
        </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Create Post</button>
    </div>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(event) {
    event.preventDefault();
  })

  function previewImage() {
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block'

    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result
    }
  }
</script>
@endsection