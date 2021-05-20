<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Accounts;

class AccountController extends Controller
{
    public function list(Request $request) {
        return json_encode(Accounts::all());
    }
    public function item(Request $request) {
        return json_encode(Accounts::find($request->id));
    }
    public function create(Request $request) {

        $data = new Accounts;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->save();

        return json_encode(
            ['success'=> true]
        );

    }
    public function update(Request $request) {

        $data = Accounts::find($request->id);
        $data->username = $request->username;
        $data->password = $request->password;
        $data->save();

        return json_encode(
            ['success' => true]
        );

    }
    public function delete(Request $request) {

        $data = Accounts::find($request->id);
        $data->delete();

        return json_encode(
            ['success' => true]
        );

    }
}
