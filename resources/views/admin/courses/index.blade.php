@extends('admin.master')

@section('title', 'All courses')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>{{ ($type == 'trash') ? 'Trashed courses' : 'All courses'  }}</h1>

    <a class="btn btn-outline-success" href="{{ route('admin.courses.create') }}">Add New course</a>

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
        <h6 class="m-0 font-weight-bold text-primary"> {{ ($type == 'trash') ? 'Trashed courses' : 'All courses'  }} </h6>
        @if ($type == 'trash')
            <a class="btn btn-danger btn-sm" href="{{ route('admin.courses.index') }}"><i class="fas fa-tags"></i> All</a>
        @else
            <a class="btn btn-danger btn-sm" href="{{ route('admin.courses.trash') }}"><i class="fas fa-trash"></i> Trash</a>
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->en_name }}</td>
                        <td>{{ $course->ar_name }}</td>
                        <td>{{ $course->category ? $course->category->trans_name : '' }}</td>
                        <td><img width="100" class="img-thumbnail" src="{{ asset(('uploads/'.$course->image)) }}" alt=""></td>
                        <td>{{ $course->discount }}%</td>
                        <td>

                            @if ($type == 'trash')
                                <a href="{{ route('admin.courses.restore', $course->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-trash-restore"></i> </a>
                                <form class="d-inline" action="{{ route('admin.courses.forceDelete', $course->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure ?!!!!')" class="btn btn-dark btn-sm"><i class="fas fa-times"></i></button>
                                </form>
                            @else
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            @endif


                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center">Mohammed Naji</td>
                        </tr>
                    @endforelse
                    {{-- @foreach ($courses as $course)

                    @endforeach --}}


                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
