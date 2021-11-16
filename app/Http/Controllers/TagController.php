<?php

  namespace App\Http\Controllers;

  use App\Models\Post;
  use App\Models\Tag;
  use Illuminate\Http\Request;

  class TagController extends Controller
  {
    public function index($slug)
    {
      $tag = Tag::where('slug', $slug)->firstOrFail();
      $posts = $tag->posts()->orderBy('id', 'desc')->paginate(5);
      return view('tags.index', compact('tag', 'posts'));
    }
  }
