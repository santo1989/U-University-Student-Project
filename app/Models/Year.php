<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $guarded = [];

   

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function markInputs()
    {
        return $this->hasMany(MarkInput::class);
    }   

    public function course()
    {
        return $this->belongsTo(Course::class);
    }   

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "student_id");
    }   

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }


}
