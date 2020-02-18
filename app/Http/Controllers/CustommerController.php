<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use App\User;
use App\Models\Custommer;
use Illuminate\Http\Request;
use Auth, Hash;
use Carbon\Carbon;
use App\Traits\ApiMotbit;
class CustommerController extends Controller
{
    use ApiMotbit;
    protected $model = 'Custommer';
    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'slug' => $request->input('slug', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', ''),
        ];
        return $rs;
    }
    public function listCustommer()
    {
        $model = $this->getModel();
        $custommer = $model->orderBy('created_at')->get();
        return view('themes.mspace.custommer.list',compact('custommer'));
    }
    public function detailCustommer($slug)
    {
        Carbon::setLocale('vi'); 
        Carbon::now('Asia/Ho_Chi_Minh');
        $model = $this->getModel();
        $custommer = $model->where('slug',$slug)->first();
        // if (empty($project)) {
        //     abort(404);
        // }
        return view('themes.mspace.custommer.detail',compact('custommer'));
    }
}
