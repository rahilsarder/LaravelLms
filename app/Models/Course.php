<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function preRequisite()
    {
        return $this->belongsTo(Course::class,'pre_req');
    }
}
