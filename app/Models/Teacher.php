<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function students()
    {
        return $this->groups()->withCount('students');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function roleTeacherName($id)
    {
        return Role::find($id)->name;
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    // public function getStudentsGradesTeacherAttribute()
    // {
    //     return $this->grades
    // }
}
