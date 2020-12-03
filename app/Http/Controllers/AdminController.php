<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.admins.index', [
            'admins' => Admin::orderBy('created_at', 'desc')->get(),
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

        return view('admin.users.admins.create', [
            'genders' => $gender
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Factory::create();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            'slug' => $faker->md5,
        ]);

        $user->admin()->create([
            'gender' => $request->gender,
        ]);

        notify()->success('Ο διαχειριστής με όνομα "' . $request->name . '" καταχωρήθηκε επιτυχώς.');

        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $gender = ['male', 'female'];

        return view('admin.users.admins.edit', [
            'admin' => $admin,
            'genders' => $gender
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $gender = ['male', 'female'];

        $user_id = Admin::where('id', $admin->id)->value('user_id');
        $oldpassword = User::where('id', $user_id)->value('password');

        if ($request->old_password) {

            if (Hash::check($request->old_password, $oldpassword)) {
                $newpassword = $request->password;
            } else {

                notify()->info('Ο παλιός κωδικός σου είναι λάθος, δώσε σωστό κωδικό.');

                return view('admin.users.admins.edit', [
                    'admin' => $admin,
                    'genders' => $gender
                ]);
            }
        } else {
            $newpassword = $oldpassword;
        }

        $admin->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newpassword),
        ]);

        $admin->update([
            'gender' => $request->gender,
        ]);

        notify()->success('Ο διαχειριστής με όνομα "' . $request->name . '" ενημερώθηκε επιτυχώς.');

        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {

        if ($admin->count() > 1) {
            $admin->delete();

            $user = User::find($admin->user_id);

            $user->delete();

            notify()->success('Ο διαχειριστής διαγράφτηκε επιτυχώς.');

            return redirect(route('admin.index'));
        }

        notify()->info('Δεν μπορείς να διαγράψεις το μοναδικό διαχειριστή.');

        return redirect(route('admin.index'));
    }
}
