<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accounts;
use App\Models\Students;
use App\Models\Course;
use App\Models\Subjects;
use App\Models\Grades;

class PageController extends Controller
{
    public function dashboard() {
        $accounts = Accounts::all();
        $students = Students::all();
        $courses = Course::all();
        $subjects = Subjects::all();
        return view('dashboard', compact('accounts', 'students', 'courses', 'subjects'));
    }
    public function accounts() {
        $data = Accounts::all();
        return view('accounts', compact('data'));
    }
    public function students() {
        $students = Students::all();
        $courses = Course::all();
        return view('students', compact('students', 'courses'));
    }
    public function courses() {
        $data = Course::all();
        return view('courses', compact('data'));
    }
    public function subjects() {
        $data = Subjects::all();
        return view('subjects', compact('data'));
    }
    public function grades() {
        $students = Students::all();
        $subjects = Subjects::all();
        $grades = Grades::all();
        return view('grades', compact('students', 'subjects', 'grades'));
    }
}
