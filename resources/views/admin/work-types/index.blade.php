@extends('admin.layouts.layout')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Work Types List</h1>
        </div>
        <div class="col-sm-6 text-right">
          <p>Edit types</p>
        </div>
      </div>
    </div>
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Work Types</h3>

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
        <a href="{{ route('work-types.create') }}" class="btn btn-primary mb-3">Add Work Type</a>
        @if(count($types))
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
              @foreach($types as $type)
                <tr>
                  <td>{{ $type->id }}</td>
                  <td>{{ $type->title }}</td>
                  <td><a href="../work-type/{{ $type->slug }}">{{ $type->slug }}</a></td>
                  <td>
                    <a href="{{ route('work-types.edit', ['work_type' => $type->id]) }}"
                       class="btn btn-info btn-sm float-left mr-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form action="{{ route('work-types.destroy', ['work_type' => $type->id]) }}"
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
              <p>There are no work types yet...</p>
            @endif
          </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        {{ $types->links() }}
      </div>
    </div>
  </section>

@endsection

