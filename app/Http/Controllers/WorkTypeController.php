<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
  public function index($slug)
  {
    $type = Type::where('slug', $slug)->firstOrFail();
    $works = $type->works()->orderBy('id', 'desc')->paginate(4);

    return view('work-types.index', compact('type', 'works'));
  }
}
