<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $appends = ['gradeSubjectName', 'gradeTeacherName'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getGradeSubjectNameAttribute()
    {
        return $this->subject->subject_name;
    }

    public function getGradeTeacherNameAttribute()
    {
        return $this->teacher->user->name;
    }
}
