<?php

  namespace App\Http\Controllers;

  use App\Models\Page;
  use App\Models\Post;
  use App\Models\Work;
  use Illuminate\Http\Request;

  class PageController extends Controller
  {
    public function index($slug)
    {
      $posts = Post::orderBy('id', 'desc')->paginate(3);
      $works = Work::orderBy('id', 'desc')->paginate(4);
      $page = Page::where('slug', $slug)->firstOrFail();
      if ($slug == 'home') {
        return redirect()->route('home');
      } elseif ($slug == 'blog' || $slug == 'works' || $slug == 'contact') {
        return view("pages.{$slug}", compact('page', 'posts', 'works'));
      }
      return view('pages.single', compact('page'));
    }
  }
