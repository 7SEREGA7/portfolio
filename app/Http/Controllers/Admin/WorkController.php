<?php

  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Models\Type;
  use App\Models\Work;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Storage;

  class WorkController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
      $works = Work::orderBy('id', 'desc')->paginate(20);
      return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
      $types = Type::pluck('title', 'id')->all();
      return view('admin.works.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|min:2',
        'description' => 'required|min:5',
        'content' => 'required',
        'thumbnail' => 'nullable|image'
      ]);

      $data = $request->all();

      $data['thumbnail'] = Work::uploadImage($request);
      $work = Work::create($data);

//      $work = Work::create($request->all());
      $work->types()->sync($request->types);
      return redirect()->route('works.index')->with('success', 'New work has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
      $work = Work::find($id);
      $types = Type::pluck('title', 'id')->all();
      return view('admin.works.edit', compact('work', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required|min:2',
        'description' => 'required|min:5',
        'content' => 'required',
        'thumbnail' => 'nullable|image'
      ]);

      $work = Work::find($id);
      $data = $request->all();
      $file = Work::uploadImage($request);
      if ($file) {
        $data['thumbnail'] = $file;
      }
      $work->update($data);
      $work->types()->sync($request->types);

//      $work = Work::find($id);
//      $work->update($request->all());
//      $work->types()->sync($request->types);
      return redirect()->route('works.index')->with('success', 'The work has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

      $work = Work::find($id);
      $work->types()->sync([]);
      Storage::delete($work->thumbnail);
      $work->delete();
//      Work::find($id)->delete();
      return redirect()->route('works.index')->with('success', 'The work has been removed');
    }
  }
