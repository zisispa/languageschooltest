<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\CreateGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Level;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role_id == 1) {
            $groups = Group::all();
        } else {
            $groups = auth()->user()->teacher->groups;
        }

        return view('admin.groups.index', [
            'groups' => $groups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (auth()->user()->role_id == 1) {
            $teachers = Teacher::all();
        } else if (auth()->user()->role_id == 2) {
            $teachers = Teacher::where('id', auth()->user()->teacher->id)->get();
        } else {
            $teachers = Teacher::all();
        }

        return view('admin.groups.create', [
            'levels' => Level::all(),
            'teachers' => $teachers,
            'subjects' => Subject::all(),
            'students' => Student::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create([
            'group_name' => $request->group_name,
            'group_slug' => Str::slug($request->group_name),
            'teacher_id' => $request->teacher_id,
            'level_id' => $request->level_id,
            'subject_id' => $request->subject_id,
        ]);

        if ($request->students) {
            $group->students()->attach($request->students);
        }

        notify()->success('Η τάξη "' . $request->group_name . '" δημιουργήθηκε επιτυχώς.');

        return redirect(route('group.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('admin.groups.show', [
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.groups.edit', [
            'levels' => Level::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'students' => Student::all(),
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update([
            'group_name' => $request->group_name,
            'group_slug' => Str::slug($request->group_name),
            'teacher_id' => $request->teacher_id,
            'level_id' => $request->level_id,
            'subject_id' => $request->subject_id,
        ]);

        if ($request->students) {
            $group->students()->sync($request->students);
        }

        notify()->success('Η τάξη "' . $request->group_name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('group.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        notify()->success('H τάξη διαγράφτηκε επιτυχώς.');

        return redirect(route('group.index'));
    }
}
