<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Subjects;

class SubjectsController extends Controller
{
    public function list(Request $request)
    {
        return json_encode(Subjects::with(['grades', 'courses'])->get());
    }
    public function item(Request $request)
    {
        return json_encode(Subjects::with(['grades', 'courses'])->find($request->id));
    }
    public function create(Request $request)
    {

        $data = new Subjects;
        $data->name = $request->name;
        $data->save();

        return json_encode(
            ['success' => true]
        );
    }
    public function update(Request $request)
    {

        $data = Subjects::find($request->id);
        $data->name = $request->name;
        $data->save();

        return json_encode(
            ['success' => true]
        );
    }
    public function delete(Request $request)
    {

        $data = Subjects::find($request->id);
        $data->delete();

        return json_encode(
            ['success' => true]
        );
    }
}
