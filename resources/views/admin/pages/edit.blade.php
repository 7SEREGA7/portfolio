@extends('admin.layouts.layout')

@section('content')
  <form role="form" action="{{ route('pages.update', ['page' => $page->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="title">Page Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               placeholder="Enter post title" value="{{ $page->title }}">
        @error('title')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Page Content</label>
        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                  placeholder="Enter post content">{{ $page->content }}</textarea>
      </div>

      <div class="card-footer p-0 mt-4">
        <button type="submit" class="btn btn-primary px-3">Submit</button>
      </div>
    </div>
  </form>
@endsection