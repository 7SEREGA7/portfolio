@extends('layouts.layout')

@section('title')
  @paernt()
  {{ $work->title }}
@endsection

@section('content')
  <section class="single_work">
    <h1>{{ $work->title }}</h1>
    {!! $work->content !!}
  </section>
@endsection