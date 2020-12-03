<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $oldpassword = User::where('slug', $user->slug)->value('password');

        if ($request->old_password) {

            if (Hash::check($request->old_password, $oldpassword)) {
                $newpassword = $request->password;
            } else {

                notify()->info('Ο παλιός κωδικός σου είναι λάθος, δώσε σωστό κωδικό.');

                return view('admin.users.profile', [
                    'user' => $user,
                ]);
            }
        } else {
            $newpassword = $oldpassword;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newpassword),
        ]);

        notify()->success('Tα στοιχεία σου ενημερώθηκαν επιτυχώς.');

        return redirect(route('student_view_announcements'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function notifications()
    {

        auth()->user()->unreadNotifications->markAsRead();

        return auth()->user()->notifications;
    }

    public function profile(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
        ]);
    }
}
