<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';

    public function grades() {
        return $this->hasMany(Grades::class);
    }
    public function course() { // course_id
        return $this->belongsTo(Course::class);
    }
}
