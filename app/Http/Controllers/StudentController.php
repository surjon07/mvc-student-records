<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Students;

class StudentController extends Controller
{
    public function list(Request $request) {
        return json_encode(Students::with(['grades', 'course'])->get());
    }
    public function item(Request $request) {
        return json_encode(Students::with(['grades', 'course'])->find($request->id));
    }
    public function create(Request $request) {

        $data = new Students;
        $data->fullname  = $request->fullname;
        $data->address   = $request->address;
        $data->course_id = $request->course_id;
        $data->save();

        return json_encode(
            ['success'=> true]
        );

    }
    public function update(Request $request) {

        $data = Students::find($request->id);
        $data->fullname  = $request->fullname;
        $data->address   = $request->address;
        $data->course_id = $request->course_id;
        $data->save();

        return json_encode(
            ['success' => true]
        );

    }
    public function delete(Request $request) {

        $data = Students::find($request->id);
        $data->delete();

        return json_encode(
            ['success' => true]
        );

    }
}
