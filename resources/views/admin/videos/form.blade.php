	type

<div class="row">
<div class="col-md-6">
    <div class="mb-3">
        <label>English Name</label>
        <input name="name_en" value="{{ old('name_en', $video->en_name) }}" class="form-control" placeholder="English Name" />
    </div>
</div>

{{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/xjmjq3J56v8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

<div class="col-md-6">
    <div class="mb-3">
        <label>Arabic Name</label>
        <input name="name_ar" value="{{ old('name_ar', $video->ar_name) }}" class="form-control" placeholder="Arabic Name" />
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Video</label>
        <input type="file" name="path" class="form-control">
        @if ($video->path)
        <video width="400" src="{{ asset(('uploads/'.$video->path)) }}" controls></video>
        @endif
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Type</label> <br>
        <label><input type="radio" checked name="type" value="paid"> Paid</label> <br>
        <label><input type="radio" onclick="return confirm('Are you sure?')" name="type" value="free"> Free</label>
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Course</label>
        <select class="form-control" name="course_id">
            <option value="" selected>Select</option>
            @foreach ($courses as $item)
                <option {{ ($item->id == $video->course_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
            @endforeach
        </select>
    </div>
</div>
