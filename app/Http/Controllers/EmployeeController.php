<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
use App\Helpers\Theme;
use App\Models\Employee;
class EmployeeController extends Controller
{
    use ApiMotbit;
    protected $model = 'Employee';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'email' => 'required|unique:users,id|email|max:255',
            'name' => 'required',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'email' => $request->input('email', ''),
            'phone' => $request->input('phone', ''),
            'position' => $request->input('position', ''),
            'note' => $request->input('note', ''),
            'image' => $request->input('image', ''),
        ];
        return $rs;
    }
}
