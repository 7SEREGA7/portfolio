@extends('admin.layouts.layout')

@section('content')
  <form role="form" action="{{ route('work-types.store') }}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="title">Work Type Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               placeholder="Enter work type">
        @error('title')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
      </div>
      <div class="card-footer p-0 mt-4">
        <button type="submit" class="btn btn-primary px-3">Submit</button>
      </div>
    </div>
  </form>
@endsection