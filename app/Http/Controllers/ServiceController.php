<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\Service;
use Carbon\Carbon;

class ServiceController extends Controller
{
    use ApiMotbit;
    protected $model = 'Service';
    public function processInputs($request)
    {
        $rs = [
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'link' => $request->input('link', ''),
            'image' => $request->input('image', ''),
            'order' => $request->input('order', 0),
            'status' => $request->input('status', 0)
        ];
        return $rs;
    }
    public function getService(){
        $model = $this->getModel();
        $services=$model->orderBy('created_at','DESC')->paginate(15);
        return view('themes.mspace.services.list',compact('services'));
    }
    public function detailService($link){
        Carbon::setLocale('vi'); 
        Carbon::now('Asia/Ho_Chi_Minh');
        $model = $this->getModel();
        $services = $model->where('link',$link)->first();
        // if (empty($project)) {
        //     abort(404);
        // }
        return view('themes.mspace.services.detail',compact('services'));

    }
}
