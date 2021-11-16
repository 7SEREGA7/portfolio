@extends('admin.layouts.layout')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pages List</h1>
        </div>
        <div class="col-sm-6 text-right">
          <p>Edit pages</p>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pages</h3>
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
        <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Add Page</a>
        @if(count($pages))
          <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
              <thead>
              <tr>
                <th style="width: 30px">#</th>
                <th>Title</th>
                <th>Link</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($pages as $page)
                <tr>
                  <td>{{ $page->id }}</td>
                  <td>{{ $page->title }}</td>
                  <td><a href="../{{ $page->slug }}">{{ $page->slug }}</a></td>
                  <td>
                    <a href="{{ route('pages.edit', ['page' => $page->id]) }}"
                       class="btn btn-info btn-sm float-left mr-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form action="{{ route('pages.destroy', ['page' => $page->id]) }}"
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
              <p>There are no pages yet...</p>
            @endif
          </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        {{ $pages->links() }}
      </div>
    </div>
  </section>

@endsection