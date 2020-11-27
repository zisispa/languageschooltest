<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['levelSubjectName'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_student');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class);
    }

    public function hasStudent($student_id)
    {
        return in_array($student_id, $this->students->pluck('id')->toArray());
    }

    public function getLevelSubjectNameAttribute()
    {
        return $this->group_name . '-' . $this->level->level_name  . '-' . $this->subject->subject_name;
    }

    public function studentHasGrade($student_id)
    {
        if (Grade::where('student_id', '=', $student_id)->exists()) {
            return true;
        }

        return false;
    }
}
