<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'id';

    public function subject() {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }
    public function student() {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
