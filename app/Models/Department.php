<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chairman()
    {
        return $this->hasOne(User::class, 'id', 'department_chairman');
    }
}
