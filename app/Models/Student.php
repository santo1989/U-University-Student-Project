<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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


}
