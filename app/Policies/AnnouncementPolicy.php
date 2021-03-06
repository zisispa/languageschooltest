<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Announcement  $announcement
     * @return mixed
     */
    public function view(User $user, Announcement $announcement)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Announcement  $announcement
     * @return mixed
     */
    public function update(User $user, Announcement $announcement)
    {
        // return auth()->user()->teacher->id == $announcement->teacher->id
        //     ? Response::allow()
        //     : Response::deny('ΔΕΝ ΕΧΕΙΣ ΔΙΚΑΙΩΜΑ ΝΑ ΕΠΕΞΕΡΓΑΣΤΕΙΣ ΑΥΤΗ ΤΗΝ ΑΝΑΚΟΙΝΩΣΗ.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Announcement  $announcement
     * @return mixed
     */
    public function delete(User $user, Announcement $announcement)
    {
        // return auth()->user()->teacher->id == $announcement->teacher->id
        //     ? Response::allow()
        //     : Response::deny('ΔΕΝ ΕΧΕΙΣ ΔΙΚΑΙΩΜΑ ΝΑ ΔΙΑΓΡΑΨΕΙΣ ΑΥΤΗ ΤΗΝ ΑΝΑΚΟΙΝΩΣΗ.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Announcement  $announcement
     * @return mixed
     */
    public function restore(User $user, Announcement $announcement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Announcement  $announcement
     * @return mixed
     */
    public function forceDelete(User $user, Announcement $announcement)
    {
        //
    }
}
