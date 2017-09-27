<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    public function categoryId()
    {
        return $this->belongsTo(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
