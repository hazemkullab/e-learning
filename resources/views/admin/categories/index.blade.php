@extends('admin.master')

@section('title', 'All Categories')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>{{ ($type == 'trash') ? 'Trashed Categories' : 'All Categories'  }}</h1>

    <a class="btn btn-outline-success" href="{{ route('admin.categories.create') }}">Add New Category</a>

</div>

@if (session('msg'))
<div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="card shadow mt-4 mb-4">
    <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary"> {{ ($type == 'trash') ? 'Trashed Categories' : 'All Categories'  }} </h6>
        @if ($type == 'trash')
            <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.index') }}"><i class="fas fa-tags"></i> All</a>
        @else
            <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.trash') }}"><i class="fas fa-trash"></i> Trash</a>
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Parent</th>
                        <th>Courses Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Parent</th>
                        <th>Courses Count</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->en_name }}</td>
                        <td>{{ $category->ar_name }}</td>
                        <td>{{ $category->parent ? $category->parent->trans_name : '' }}</td>
                        <td>{{ $category->courses->count() }}</td>
                        <td>

                            @if ($type == 'trash')
                                <a href="{{ route('admin.categories.restore', $category->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-trash-restore"></i> </a>
                                <form class="d-inline" action="{{ route('admin.categories.forceDelete', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure ?!!!!')" class="btn btn-dark btn-sm"><i class="fas fa-times"></i></button>
                                </form>
                            @else
                                @can('categories.edit')
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                @endcan

                                @can('categories.delete')
                                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan

                            @endif


                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center">Mohammed Naji</td>
                        </tr>
                    @endforelse
                    {{-- @foreach ($categories as $category)

                    @endforeach --}}


                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
