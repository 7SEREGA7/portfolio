@extends('layouts.layout')

@section('title')
  @parent
  {{ $type->title }}
@endsection

@section('content')
  @if(count($works))
    <section class="works">
      <h1>{{ $type->title }}</h1>
      <div class="works">
        @foreach($works as $work)
          <div class="work">
            <a href="{{ route('works.single', ['slug' => $work->slug]) }}" class="work_img"><img src="{{ $work->getImage() }}" alt=""></a>
            <div class="work_text">
              <a href="{{ route('works.single', ['slug' => $work->slug]) }}"><h2>{{ $work->title }}</h2></a>
              <div class="work_info">
                <span class="work_year">{{ $work->getWorkDate() }}</span>
                <div class="work_types">
                  @foreach($work->types as $key => $type)
                    <a href="{{ route('types.single', ['slug' => $type->slug]) }}">{{$type->title}}@if($key + 1 < count($work->types)), @endif</a>
                  @endforeach
                </div>
              </div>
              <p>{{ $work->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center mt-3 mt-md-5">{{ $works->links() }}</div>
    </section>
  @endif

@endsection