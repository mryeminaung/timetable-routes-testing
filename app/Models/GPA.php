<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GPA extends Model
{
    protected $fillable = ['gpa'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
