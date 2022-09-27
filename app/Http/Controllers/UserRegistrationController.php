<?php

namespace App\Http\Controllers;

use App\Models\Curriculumns;
use App\Models\Semester;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Traits\GenerateStudentID;  ///    ******Used a custom trait!!!!!*****   /////

class UserRegistrationController extends Controller
{
    use GenerateStudentID;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('userInfo')->get();

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
            'password' => bcrypt($request->password)
        ]);


        $user_info = UserInfo::create([
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
