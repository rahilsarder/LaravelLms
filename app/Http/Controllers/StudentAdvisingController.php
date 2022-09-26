<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Semester;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentAdvisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return view('advising.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = Semester::first();

        //check if the course is added to the user already

        $courseExist = StudentCourse::where([
            'student_id' => Auth::id(),
            'course_id' => $request->course_id,
            'semester_id' => $semester->id
        ])
            ->first();

        $retake = StudentCourse::where([
            'student_id' => Auth::id(),
            'course_id' => $request->course_id,
            'semester_id' => !$semester->id
        ])
            ->first();



        if (!empty($courseExist)) {
            return back()->with('courseExist', "You've already taken this course for this semester");
        }

        if (!empty($retake)) {
            StudentCourse::create([
                'student_id' => Auth::id(),
                'course_id' => $request->course_id,
                'semester_id' => $semester->id,
                'section_id' => $request->section_id,
                'retaken' => true,
            ]);

            return back()->with('courseTaken', 'SuccessFully Retaken the Course');
        }
        

        $student_course = StudentCourse::create([
            'student_id' => Auth::id(),
            'course_id' => $request->course_id,
            'semester_id' => $semester->id,
            'section_id' => $request->section_id,
        ]);


        return back()->with('courseAdded', 'Successfully Added the course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_course = StudentCourse::where('student_id', Auth::id())->with('section')->get();
        return view('advising.show', compact('student_course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
