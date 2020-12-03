<?php

namespace App\Http\Controllers;

use App\Http\Requests\Announcement\CreateAnnouncementRequest;
use App\Http\Requests\Announcement\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\AnnouncementAdded;
use Illuminate\Support\Facades\Notification;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role_id == 1) {
            $announcements = Announcement::all();
        } else if (auth()->user()->role_id == 2) {
            $announcements = auth()->user()->teacher->announcements;
        } else if (auth()->user()->role_id == 3) {
            $announcements = Announcement::all();
        }

        return view('admin.announcements.index', [
            'announcements' => $announcements,
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

        return view('admin.announcements.create', [
            'teachers' => $teachers,
            'students' => Student::all(),
            'groups' => Group::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAnnouncementRequest $request, Announcement $announcement)
    {
        $announcement_store = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => $request->teacher_id,
        ]);

        if ($request->announcement_all) {

            $students = Student::where('id', '>', 0)->pluck('id')->toArray();

            foreach ($students as $student) {
                $announcement_store->students()->attach($student);
            }

            $users = User::where('id', '>', 0)->get();

            Notification::send($users, new AnnouncementAdded($announcement_store));
        }

        if ($request->students) {
            $announcement_store->students()->attach($request->students);

            $user_ids = array();
            foreach ($request->students as $student_id) {
                array_push($user_ids, Student::where('id', $student_id)->value('user_id'));
            }

            foreach ($user_ids as $user_id) {
                //array_push($users_students, User::where('id', $user_id)->get());
                Notification::send(User::where('id', $user_id)->get(), new AnnouncementAdded($announcement_store));
            }
        }

        if ($request->groups) {
            $announcement_store->groups()->attach($request->groups);

            $groups = array();
            foreach ($request->groups as $group) {
                array_push($groups, Group::find($group)->students);
            }

            foreach ($groups as $group) {
                foreach ($group as $student) {
                    Notification::send(User::where('id', $student->user_id)->get(), new AnnouncementAdded($announcement_store));
                }
            }
        }

        notify()->success('Η ανακοίνωση "' . $request->title . '" δημιουργήθηκε επιτυχώς.');

        return redirect(route('announcement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {

        //$this->authorize('update', $announcement);

        return view('admin.announcements.edit', [
            'announcement' => $announcement,
            'teachers' => Teacher::all(),
            'groups' => Group::all(),
            'students' => Student::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {

        //$this->authorize('update', $announcement);

        $announcement->update([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => $request->teacher_id,
        ]);

        notify()->success('Η ανακοίνωση "' . $request->title . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('announcement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //$this->authorize('delete', $announcement);

        $announcement->delete();

        notify()->success('H ανακοίνωση διαγράφτηκε επιτυχώς.');

        return redirect(route('announcement.index'));
    }
}
