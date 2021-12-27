<?php

namespace App\Models;

class Course extends BaseModel
{
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
}
