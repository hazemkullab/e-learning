<div class="row">
<div class="col-md-6">
    <div class="mb-3">
        <label>English Name</label>
        <input name="name_en" value="{{ old('name_en', $category->en_name) }}" class="form-control" placeholder="English Name" />
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label>Arabic Name</label>
        <input name="name_ar" value="{{ old('name_ar', $category->ar_name) }}" class="form-control" placeholder="Arabic Name" />
    </div>
</div>

<div class="col-md-12">
    <div class="mb-3">
        <label>Parent Category</label>
        <select class="form-control" name="parent_id">
            <option value="" selected>Select</option>
            @foreach ($categories as $item)
                <option {{ ($item->id == $category->parent_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
            @endforeach
        </select>
    </div>
</div>
