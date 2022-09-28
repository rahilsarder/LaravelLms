<?php

namespace App\Traits;

trait GenerateFacultyID
{

    public function generateFacultyId($major, $department)
    {
        $code = preg_replace('/[^0-9]/', '', $major->course_id);

        return $department->department_id . mt_rand(1111, 9999) . $code;
    }
}
