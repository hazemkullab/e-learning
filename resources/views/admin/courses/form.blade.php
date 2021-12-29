<div class="row">
<div class="col-md-6">
    <div class="mb-3">
        <label>English Name</label>
        <input name="name_en" value="{{ old('name_en', $course->en_name) }}" class="form-control" placeholder="English Name" />
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label>Arabic Name</label>
        <input name="name_ar" value="{{ old('name_ar', $course->ar_name) }}" class="form-control" placeholder="Arabic Name" />
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>English Excerpt</label>
        <textarea name="en_excerpt" class="form-control" rows="4">{{ old('en_excerpt', $course->en_excerpt) }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Arabic Excerpt</label>
        <textarea name="ar_excerpt" class="form-control" rows="4">{{ old('ar_excerpt', $course->ar_excerpt) }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>English Content</label>
        <textarea name="en_content" class="form-control mytextarea" rows="8">{{ old('en_content', $course->en_content) }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Arabic Content</label>
        <textarea name="ar_content" class="form-control mytextarea" rows="8">{{ old('ar_content', $course->ar_content) }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        <img width="100" class="img-thumbnail" src="{{ asset(('uploads/'.$course->image)) }}" alt="">
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Discount</label>
        <input type="text" name="discount" value="{{ old('discount', $course->discount) }}" class="form-control">
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="" selected>Select</option>
            @foreach ($categories as $item)
                <option {{ ($item->id == $course->category_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
            @endforeach
        </select>
    </div>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>
<script>
    tinymce.init({
      selector: '.mytextarea',
      plugins: ['code']
    });
</script>
@stop
