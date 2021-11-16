<?php

  namespace App\Http\Controllers;

  use App\Models\Work;
  use Illuminate\Http\Request;

  class WorkController extends Controller
  {
    public function index($slug)
    {
      $work = Work::where('slug', $slug)->firstOrFail();
      return view('works.index', compact('work'));
    }
  }
