@extends('admin.layouts.layout')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tags List</h1>
        </div>
        <div class="col-sm-6 text-right">
          <p>Edit works</p>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Works</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{ route('works.create') }}" class="btn btn-primary mb-3">Add Work</a>
        @if(count($works))
          <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
              <thead>
              <tr>
                <th style="width: 30px">#</th>
                <th>Title</th>
                <th>Link</th>
                <th>Work Types</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($works as $work)
                <tr>
                  <td>{{ $work->id }}</td>
                  <td>{{ $work->title }}</td>
                  <td><a href="../work/{{ $work->slug }}">{{ $work->slug }}</a></td>
                  <td>
                    {{ $work->types->pluck('title')->join(', ') }}</td>
                  <td>
                    <a href="{{ route('works.edit', ['work' => $work->id]) }}"
                       class="btn btn-info btn-sm float-left mr-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form action="{{ route('works.destroy', ['work' => $work->id]) }}"
                          method="post" class="float-left">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                              onclick="return confirm('Confirm deleting')">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            @else
              <p>There are no works yet...</p>
            @endif
          </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        {{ $works->links() }}
      </div>
    </div>
  </section>

@endsection

