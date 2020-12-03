<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Teachers\CreateTeacherRequest;
use App\Http\Requests\Users\Teachers\UpdateTeacherRequest;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $gender = ['male', 'female'];

        return view('admin.users.teachers.create', [
            'genders' => $gender
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeacherRequest $request)
    {

        $faker = Factory::create();

        if ($request->phone) {
            $request->validate([
                'phone' => 'min:9|max:10',
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'slug' => $faker->md5,
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
        $gender = ['male', 'female'];

        return view('admin.users.teachers.edit', [
            'teacher' => $teacher,
            'genders' => $gender
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

        $gender = ['male', 'female'];

        if ($request->phone) {
            $request->validate([
                'phone' => 'min:9|max:10',
            ]);
        }

        $user_id = Teacher::where('id', $teacher->id)->value('user_id');
        $oldpassword = User::where('id', $user_id)->value('password');

        if ($request->old_password) {

            if (Hash::check($request->old_password, $oldpassword)) {
                $newpassword = $request->password;
            } else {

                notify()->info('Ο παλιός κωδικός σου είναι λάθος, δώσε σωστό κωδικό.');

                return view('admin.users.teachers.edit', [
                    'teacher' => $teacher,
                    'genders' => $gender
                ]);
            }
        } else {
            $newpassword = $oldpassword;
        }



        $teacher->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newpassword),
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
