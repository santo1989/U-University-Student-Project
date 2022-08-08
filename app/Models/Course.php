<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

   
    public function exam()
    {
        return $this->hasMany(Exam::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }

    
}
