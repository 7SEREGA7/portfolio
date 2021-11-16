@extends('admin.layouts.layout')

@section('content')
  <form role="form" action="{{ route('works.update', ['work' => $work->id]) }}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="title">Work Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               placeholder="Enter work title" value="{{ $work->title }}">
        @error('title')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description">Work Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                  cols="30" rows="3" placeholder="Enter work description">{{ $work->description }}</textarea>
        @error('description')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Work Content</label>
        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                  placeholder="Enter work content">{{ $work->content }}</textarea>
        @error('content')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="types">Tags</label>
        <select name="types[]" id="types" class="select2" multiple="multiple"
                data-placeholder="Select work types" style="width: 100%;">
          @foreach($types as $key => $val)
            <option value="{{ $key }}"
                    @if(in_array($key, $work->types->pluck('id')->all())) selected @endif>{{ $val }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="thumbnail">Work Image</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
            <label class="custom-file-label" for="thumbnail">Choose file</label>
          </div>
        </div>
        @error('thumbnail')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>
      <div><img class="img-thumbnail mt2" src="{{ $work->getImage() }}" alt="" width="200"></div>

      <div class="card-footer p-0 mt-4">
        <button type="submit" class="btn btn-primary px-3">Submit</button>
      </div>
    </div>
  </form>
@endsection