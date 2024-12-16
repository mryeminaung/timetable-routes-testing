<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'course_no', 'credit_id', 'program_id'];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
