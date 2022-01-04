<?php

namespace App\Models;

class Video extends BaseModel
{
    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }
}
