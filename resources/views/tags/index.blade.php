@extends('layouts.layout')

@section('title')
  @parent
  {{ $tag->title }}
@endsection

@section('content')
  <section class="blog">
    <h1>{{ $tag->title }}</h1>
    @if(count($posts))
      <div class="posts">
        @foreach($posts as $post)
          <div class="post">
            <a href="{{ route('posts.single', ['slug' => $post->slug]) }}"><h2>{{ $post->title }}</h2></a>
            <div class="post_info">
              <span class="post_date">{{ $post->getPostDate() }}</span>
              @if(count($post->tags))
                <div class="post_tags">
                  @foreach($post->tags as $key => $tag)
                    <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}@if(count($post->tags) != $key + 1)
                        , @endif</a>
                  @endforeach
                </div>
              @endif
            </div>
            <p>{{ $post->description }}</p>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center mt-3 mt-md-5">{{ $posts->links() }}</div>
    @endif
  </section>
@endsection
