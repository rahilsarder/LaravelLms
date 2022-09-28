<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculumns;
use App\Models\Department;
use App\Models\FacultyInfo;
use App\Models\Semester;
use App\Models\User;
use App\Models\UserInfo;
use App\Traits\GenerateFacultyID;
use App\Traits\GenerateShortFormFaculty;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Traits\GenerateStudentID;  ///    ******Used a custom trait!!!!!*****   /////

class UserRegistrationController extends Controller
{
    use GenerateStudentID, GenerateShortFormFaculty, GenerateFacultyID;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['userInfo', 'faculty'])->get();

        $roles = Role::get();

        $curriculums = Curriculumns::all();

        return view('registration.index', compact('users', 'roles', 'curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $semester = Semester::first()->semester_code;

        $curriculumn = Curriculumns::find($request->curriculumn);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'isFaculty' => 0,
            'isChairman' => 0
        ]);


        UserInfo::create([
            'curriculum_name' => $curriculumn->name,
            'user_id' => $user->id,
            'student_id' => $this->generate($request, $semester, $curriculumn->curriculumn_id),
            'full_name' => $request->name,
            'enrolled_in' => $semester,
            'test_pass' => $request->test_pass,
            'current_status' => 'enrolled',
            'current_cgpa' => 0.00,
            'credit_passed' => 0.00,
            'probation' => 0,
            'major1' => null,
            'major2' => null,
        ]);

        $user->assignRole('Student');

        return back()->with('success', 'Successfully Added the User');
    }

    public function faculty()
    {
        $faculties = User::with('faculty')
            ->where('isFaculty', 1)
            ->get();

        $courses = Course::all();

        $departments = Department::all();

        return view('registration.faculty', compact('faculties', 'courses', 'departments'));
    }

    public function storeFaculty(Request $request)
    {
        $major = Course::find($request->major_course);
        $department = Department::find($request->department);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'isFaculty' => 1,
            'isChairman' => 0
        ]);

        FacultyInfo::create([
            'user_id' => $user->id,
            'full_name' => $request->name,
            'faculty_id' => $this->generateFacultyId($major, $department),
            'major_course' => $request->major_course,
            'short_form' => $this->generateShortForm($request),
            'department' => $request->department
        ]);

        return back()->with('success', 'Successfully created a Faculty record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
