<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Grades;

class GradesController extends Controller
{
    public function list(Request $request)
    {
        return json_encode(Grades::with(['student', 'subject'])->get());
    }
    public function item(Request $request)
    {
        return json_encode(Grades::with(['student', 'subject'])->find($request->id));
    }
    public function create(Request $request)
    {

        $data = new Grades;
        $data->student_id   = $request->student_id;
        $data->subject_id   = $request->subject_id;
        $data->grade        = $request->grade;
        $data->save();

        return json_encode(
            ['success' => true]
        );
    }
    public function update(Request $request)
    {

        $data = Grades::find($request->id);
        $data->student_id   = $request->student_id;
        $data->subject_id   = $request->subject_id;
        $data->grade        = $request->grade;
        $data->save();

        return json_encode(
            ['success' => true]
        );
    }
    public function delete(Request $request)
    {

        $data = Grades::find($request->id);
        $data->delete();

        return json_encode(
            ['success' => true]
        );
    }
}
