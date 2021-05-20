<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';

    public function students() {
        return $this->hasMany(Students::class);
    }
    public function subjects() {
        return $this->belongsToMany(Subjects::class, 'course_subject', 'course_id', 'subject_id');
    }
}
