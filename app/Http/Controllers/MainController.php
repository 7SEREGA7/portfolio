<?php

  namespace App\Http\Controllers;

  use App\Models\Page;
  use App\Models\Post;
  use App\Models\Work;
  use Illuminate\Http\Request;

  class MainController extends Controller
  {
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->limit(2)->get();
      $page = Page::where('slug', 'home')->firstOrFail();
      $works = Work::orderBy('id', 'desc')->limit(3)->get();
      return view('index', compact('page', 'posts', 'works'));
    }
  }
