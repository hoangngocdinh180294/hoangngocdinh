<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;
use Carbon\Carbon;

class RecruitmentController extends Controller
{
    use ApiMotbit;
    protected $model = 'Recruitment';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'position' => 'required',
            'slug' => 'required|unique:recruitment,id|max:255',
        ]);
        $rs = [
            'position' => $request->input('position', ''),
            'exp' => $request->input('exp', ''),
            'qty' => $request->input('qty', ''),
            'slug' => $request->input('slug', ''),
            'description' => $request->input('description', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'benefit' => $request->input('benefit', ''),
            'requried' => $request->input('requried', ''),
            'salary' => $request->input('salary', '')
        ];
      
        return $rs;
    }
    public function listRecruitment(){
        $model = $this->getModel();
        $recruitment=$model->all();
        return view('themes.mspace.recruitment.list',compact('recruitment'));

        // $prices=$model->paginate(12);
        // return view('themes.mspace.prices.list',compact('prices'));

    }
    public function detailRecruitment($slug){
        Carbon::setLocale('vi'); 
        Carbon::now('Asia/Ho_Chi_Minh');
        $model = $this->getModel();
        $recruitment = $model->where('slug',$slug)->first();
        if (!empty($recruitment)) {
            abort(404);
        }
        $all= $model->take(5)->get();
        return view('themes.mspace.recruitment.detail',compact('recruitment','all'));

    }

}
