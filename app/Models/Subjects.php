<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';

    public function grades() {
        return $this->hasMany(Grades::class, 'subject_id');
    }
    public function courses() {
        return $this->belongsToMany(Course::class, 'course_subject', 'course_id', 'subject_id');
    }
}
