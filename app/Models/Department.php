<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // public $timestamps = false;

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }
}
