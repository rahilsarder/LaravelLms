<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function major()
    {
        return $this->hasMany(Course::class, 'id', 'major_course');
    }
}
