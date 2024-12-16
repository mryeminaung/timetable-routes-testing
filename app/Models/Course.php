<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'course_code', 'credit', 'program_id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }

    public function setCourseCodeAttribute($value)
    {
        $this->attributes['course_code'] = ucwords($value);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
