<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroupReserve extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
