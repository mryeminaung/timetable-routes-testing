<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'nickname', 'roll_no', 'email', 'password', 'semester_id', 'class_id', 'gpa_id'];
}
