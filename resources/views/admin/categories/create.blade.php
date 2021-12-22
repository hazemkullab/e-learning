@extends('admin.master')

@section('title', 'Create Category')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Add New</h1>

    <a class="btn btn-outline-success" onclick="window.history.back()
    ">Return Back</a>
</div>

@include('admin.errors')

<div class="card shadow mt-4 mb-4">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>English Name</label>
                        <input name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="English Name" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Arabic Name</label>
                        <input name="name_ar" value="{{ old('name_ar') }}" class="form-control" placeholder="Arabic Name" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label>Parent Category</label>
                        <select class="form-control" name="parent_id">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-success px-5">Add</button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop
