@extends('layouts.layout')

@section('title')
  @parent
  {{ $post->title }}
@endsection

@section('content')
  <h1>{{ $post->title }}</h1>
@endsection