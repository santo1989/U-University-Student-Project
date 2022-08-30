<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function markInputs()
    {
        return $this->hasMany(MarkInput::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projectGroups()
    {
        return $this->belongsToMany(ProjectGroup::class);
    }

    public function projectGroupReserves()
    {
        return $this->belongsToMany(ProjectGroupReserve::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    
}
