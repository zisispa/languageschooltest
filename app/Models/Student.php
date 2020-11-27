<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['studentName', 'studentGrades'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_student');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class);
    }

    public function roleStudentName($id)
    {
        return Role::find($id)->name;
    }

    public function getStudentNameAttribute()
    {
        return $this->user->name;
    }

    public function getStudentGradesAttribute()
    {
        //$group_id = $this->grades()->value('group_id');
        return $this->grades()->where('teacher_id', auth()->user()->teacher->id)->get();
    }
}
