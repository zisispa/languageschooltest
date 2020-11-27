<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role_id == 1) {
            return view('dashboard.index', [
                'groups' => Group::all(),
                'students' => Student::all(),
                'announcements' => Announcement::all(),
                'teachers' => Teacher::all(),
            ]);
        } else if (auth()->user()->role_id == 2) {
            return view('dashboard.index', [
                'groups' => auth()->user()->teacher->groups,
                'students' => Student::all(),
                'announcements' => auth()->user()->teacher->announcements,
                'teachers' => Teacher::all(),
            ]);
        }

        return view('dashboard.index', [
            'groups' => Group::all(),
            'students' => Student::all(),
            'announcements' => Announcement::all(),
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
        //
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
