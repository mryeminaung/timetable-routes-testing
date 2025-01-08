<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nickname', 'roll_no', 'email', 'password', 'semester_id', 'major_id', 'class_id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
