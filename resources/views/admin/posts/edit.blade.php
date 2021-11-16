@extends('admin.layouts.layout')

@section('content')
  <form role="form" action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               placeholder="Enter post title" value="{{ $post->title }}">
        @error('title')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description">Post Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                  cols="30" rows="3" placeholder="Enter post description">{{ $post->description }}</textarea>
        @error('description')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30"
                  rows="5" placeholder="Enter post content">{{ $post->content }}</textarea>
        @error('content')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="tags">Tags</label>
        <select name="tags[]" id="tags" class="select2" multiple="multiple"
                data-placeholder="Select tags" style="width: 100%;">
          @foreach($tags as $key => $val)
            <option value="{{ $key }}" @if(in_array($key, $post->tags->pluck('id')->all())) selected @endif>{{ $val }}</option>
          @endforeach
        </select>
      </div>

      <div class="card-footer p-0 mt-4">
        <button type="submit" class="btn btn-primary px-3">Submit</button>
      </div>
    </div>
  </form>
@endsection