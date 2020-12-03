<?php

namespace App\Http\Controllers;

use App\Http\Requests\Level\CreateLevelRequest;
use App\Http\Requests\Level\UpdateLevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.levels.index', [
            'levels' => Level::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLevelRequest $request)
    {
        Level::create([
            'level_name' => $request->level_name,
            'level_slug' => Str::slug($request->level_name),
        ]);

        notify()->success('Το επίπεδο "' . $request->level_name . '" καταχωρήθηκε επιτυχώς.');

        return redirect(route('level.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', [
            'level' => $level,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update([
            'level_name' => $request->level_name,
            'level_slug' => Str::slug($request->level_name),
        ]);

        notify()->success('Το επίπεδο "' . $request->level_name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('level.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        notify()->success('Το επίπεδο διαγράφτηκε επιτυχώς.');

        return redirect(route('level.index'));
    }
}
