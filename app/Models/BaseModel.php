<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getTransNameAttribute()
    {
        $name = $this->name;
        $name_current = json_decode($name, true);

        return $name_current ? $name_current[app()->currentLocale()] : '';
    }

    public function getEnNameAttribute()
    {
        $name = $this->name;
        $name_current = json_decode($name, true);

        return $name_current ? $name_current['en'] : '';
    }

    public function getArNameAttribute()
    {
        $name = $this->name;
        $name_current = json_decode($name, true);

        return $name_current ? $name_current['ar'] : '';
    }


}
