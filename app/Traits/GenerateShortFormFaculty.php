<?php

namespace App\Traits;

trait GenerateShortFormFaculty
{

    public function generateShortForm($request)
    {
        $words = explode(" ", $request->name);
        $short_form = "";

        foreach ($words as $word) {
            $short_form .= mb_substr($word, 0, 1);
        }

        return $short_form;
    }
}
