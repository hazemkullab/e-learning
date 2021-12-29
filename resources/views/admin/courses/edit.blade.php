@extends('admin.master')

@section('title', 'Create course')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Update : {{ $course->trans_name }}</h1>

    <a class="btn btn-outline-success" onclick="window.history.back()
    ">Return Back</a>
</div>

@include('admin.errors')

<div class="card shadow mt-4 mb-4">
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.courses.form')

                <div class="col-md-12">
                    <button class="btn btn-info px-5">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop
