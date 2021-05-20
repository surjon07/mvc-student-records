<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Course;

class CourseController extends Controller
{
    public function list(Request $request) {
        return json_encode(Course::with(['students', 'subjects'])->get());
    }
    public function item(Request $request) {
        return json_encode(Course::with(['students', 'subjects'])->find($request->id));
    }
    public function create(Request $request) {

        $data = new Course;
        $data->name = $request->name;
        $data->save();

        return json_encode(
            ['success'=> true]
        );

    }
    public function update(Request $request) {

        $data = Course::find($request->id);
        $data->name = $request->name;
        $data->save();

        return json_encode(
            ['success' => true]
        );

    }
    public function delete(Request $request) {

        $data = Course::find($request->id);
        $data->delete();

        return json_encode(
            ['success' => true]
        );

    }
}
