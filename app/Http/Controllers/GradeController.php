<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grade\CreateGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role_id == 1) {
            $grades = Grade::all();
        } else if (auth()->user()->role_id == 2) {
            $grades = auth()->user()->teacher->grades;
        } else if (auth()->user()->role_id == 3) {
            $grades = Grade::all();
        }

        return view('admin.grades.index', [
            'grades' => $grades,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grades.create', [
            'teachers' => Teacher::all(),
            'students' => Student::all(),
            'groups' => Group::all(),
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGradeRequest $request)
    {
        // if ($request) {
        Grade::create([
            'grade_name' => $request->grade_name,
            'grade_day' => $request->grade_day,
            'value' => $request->value,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
            'semester' => $request->semester,
        ]);

        notify()->success('Η βαθμογολία "' . $request->grade_name . '" δημιουργήθηκε επιτυχώς.');

        return redirect()->back();
        // }
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('admin.grades.show', [
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', [
            'grade' => $grade,
            'students' => Student::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {

        if ($request) {
            $grade->update([
                'grade_name' => $request->grade_name,
                'grade_day' => $request->grade_day,
                'value' => $request->value,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'student_id' => $request->student_id,
                'semester' => $request->semester,
            ]);

            notify()->success('Η βαθμογολία "' . $request->grade_name . '" ενημερώθηκε επιτυχώς.');

            return redirect(route('grade.index'));
        }
        return redirect(route('grade.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        notify()->success('Η βαθμογολία διαγράφηκε επιτυχώς.');

        return redirect(route('grade.index'));
    }

    public function getStudentFromGroupName($group_id)
    {
        $users = Group::find($group_id)->students()->get();

        return response()->json($users);
    }

    public function getgradesbysemester($semester)
    {
        return Grade::where('student_id', auth()->user()->student->id)->where('semester', $semester)->get();
    }
}
