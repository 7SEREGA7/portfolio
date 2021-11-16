@extends('layouts.layout')

@section('title')
  @parent
  {{ $page->title }}
@endsection

@section('content')
  <h1>{{ $page->title }}</h1>
  casd
@endsection