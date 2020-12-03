<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function hasStudents($student_id)
    {
        return in_array($student_id, $this->students->pluck('id')->toArray());
    }

    public function hasGroups($group_id)
    {
        return in_array($group_id, $this->groups->pluck('id')->toArray());
    }
}
