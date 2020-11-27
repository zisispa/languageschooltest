<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Students\CreateStudentRequest;
use App\Http\Requests\Users\Students\UpdateStudentRequest;
use App\Models\Announcement;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

// admin.users.students.

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.students.index', [
            'students' => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3
        ]);

        $user->student()->create([
            'phone' => $request->phone,
            'current_address' => $request->current_address,
            'gender' => $request->gender,
        ]);

        notify()->success('Ο μαθητής με όνομα "' . $request->name . '" καταχωρήθηκε επιτυχώς.');

        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.users.students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $student->update([
            'phone' => $request->phone,
            'current_address' => $request->current_address,
            'gender' => $request->gender,
        ]);

        notify()->success('Ο μαθητής με όνομα "' . $request->name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        $student->delete();

        $user = User::find($student->user_id);

        $user->delete();

        notify()->success('Ο μαθητής διαγράφτηκε επιτυχώς.');

        return redirect(route('student.index'));
    }

    public function student_view_grades()
    {
        return view('student.grades.index', [
            'grades' => auth()->user()->student->grades,
        ]);
    }


    public function student_view_announcements()
    {

        // auth()->user()->unreadNotifications->markAsRead();

        $group_ids = auth()->user()->student->groups->pluck('id');

        $groups = array();
        foreach ($group_ids as $id) {
            array_push($groups, Group::find($id)->announcements()->get());
        }

        return view('student.announcements.index', [
            'general_announcements' => auth()->user()->student->announcements()->latest()->paginate(5),
            'group_announcements' => $groups,
        ]);
    }


    public function student_view_groups()
    {
        return view('student.groups.index', [
            'groups' => auth()->user()->student->groups,
        ]);
    }
}
