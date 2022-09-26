<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sections()
    {
        return $this->belongsTo(Section::class)->with('students');
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
