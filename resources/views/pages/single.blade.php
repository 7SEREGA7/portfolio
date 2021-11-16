@extends('layouts.layout')

@section('title')
  @parent
  {{ $page->title }}
@endsection

@section('content')
  <h1>Page {{ $page->title }} will be created soon!</h1>
  {!! $page->content !!}
@endsection
