<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;

class ProjectCategoryController extends Controller
{
    use ApiMotbit;
    protected $model = 'ProjectCategory';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'slug' => $request->input('slug', ''),
            // 'meta_description' => $request->input('meta_description', ''),
            // 'meta_keywords' => $request->input('meta_keywords', ''),
        ];
        return $rs;
    }

    public function resultOne($request, $data) {
        return $data;
    }
}
