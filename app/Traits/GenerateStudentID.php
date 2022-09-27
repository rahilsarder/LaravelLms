<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait GenerateStudentID
{

    public function generate(Request $request, $semester, $curriculumn)
    {
        return $student_id = $semester . $request->test_pass . $curriculumn;
    }
}
