<?php

namespace App\Models;

class Category extends BaseModel
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
