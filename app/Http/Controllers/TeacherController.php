<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Teachers\CreateTeacherRequest;
use App\Http\Requests\Users\Teachers\UpdateTeacherRequest;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.teachers.index', [
            'teachers' => Teacher::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2
        ]);

        $user->teacher()->create([
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        notify()->success('Ο καθηγητής με όνομα "' . $request->name . '" καταχωρήθηκε επιτυχώς.');

        return redirect(route('teacher.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.users.teachers.edit', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $teacher->update([
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        notify()->success('Ο καθηγητής με όνομα "' . $request->name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('teacher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        $user = User::find($teacher->user_id);

        $user->delete();

        notify()->success('Ο καθηγητής διαγράφτηκε επιτυχώς.');

        return redirect(route('teacher.index'));
    }

    public function teachergrades()
    {
        return view('teacher.grades.index', [
            'groups' => auth()->user()->teacher->groups,
        ]);
    }

    public function teachergradesbygroupid($group_id)
    {
        return Group::find($group_id)->students()->get();

        // return view('teacher.grades.index', [
        //     'student_group' => auth()->user()->teacher->groups,
        //     ''
        // ]);
    }

    public function student_view_grade_by_group_id($group_id, $student_id)
    {

        $grades = Grade::where('group_id', $group_id)->where('student_id', $student_id)->get();

        return view('teacher.grades.show_grade_student_by_group_id', [
            'grades' => $grades,
        ]);
    }
}
