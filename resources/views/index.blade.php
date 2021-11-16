@extends('layouts.layout')

@section('title')
  @parent
  Home
@endsection

@section('content')
  <section
          class="intro d-flex flex-column-reverse flex-md-row justify-content-between align-items-center align-items-md-start">
    {!! $page->content !!}
{{--    <div class="intro_text">--}}
{{--        <h1>Hi, I am John, <br> Creative Technologist</h1>--}}
{{--      <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim--}}
{{--        velit--}}
{{--        mollit. Exercitation veniam consequat sunt nostrud amet.</p>--}}
{{--      <a href="{{ asset('assets/front/img/photo.png') }}" download>Download Resume</a>--}}
{{--    </div>--}}
{{--    <div class="intro_img">--}}
      <img src="{{ asset('assets/front/img/photo.png') }}" alt="">
{{--    </div>--}}
  </section>
  @if(count($posts))
    <section class="recent_posts_section">
      <div class="recent_posts_top w-100 d-flex justify-content-between align-items-center">
        <h4>Recent posts</h4>
        <a href="/blog" class="view_all">View all</a>
      </div>
      <div class="d-flex flex-wrap justify-content-center justify-content-md-between">
        @foreach($posts as $post)
          <div class="recent_post">
            <a class="recent_post_title" href="{{ route('posts.single', ['slug' => $post->slug]) }}">
              <h3>{{ $post->title }}</h3>
            </a>
            <div class="post_info">
              <span class="post_date">{{ $post->getPostDate() }}</span>
              @if(count($post->tags))
                <div class="post_tags">
                  @foreach($post->tags as $key => $tag)
                    <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{$tag->title}}@if($key + 1 < count($post->tags)), @endif</a>
                  @endforeach
                </div>
              @endif
            </div>
            <p>{{ $post->description }}</p>
          </div>
        @endforeach
      </div>
    </section>
  @endif

  @if(count($works))
  <section class="featured_works">
    <h4>Featured works</h4>
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
  </section>
  @endif

@endsection