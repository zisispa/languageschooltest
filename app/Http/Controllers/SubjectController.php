<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subjects.index', [
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subjects.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubjectRequest $request)
    {
        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_slug' => Str::slug($request->subject_name),
        ]);

        notify()->success('Το όνομα του μαθήματος "' . $request->subject_name . '" καταχωρήθηκε επιτυχώς.');

        return redirect(route('subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', [
            'subject' => $subject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update([
            'subject_name' => $request->subject_name,
            'subject_slug' => Str::slug($request->subject_name),
        ]);

        notify()->success('Το όνομα του μαθήματος "' . $request->level_name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        notify()->success('Το μα΄θημα διαγράφτηκε επιτυχώς.');

        return redirect(route('subject.index'));
    }
}
