<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;

class SettingController extends Controller
{
    use ApiMotbit;
    protected $model = 'Setting';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'key' => 'required|unique:settings,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'key' => $request->input('key', ''),
            'value' => $request->input('value', ''),
            'type' => 'string'
        ];
        return $rs;
    }

    public function resultOne($request, $data) {
        return $data;
    }
}
