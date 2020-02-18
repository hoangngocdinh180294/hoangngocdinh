<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;
use Carbon\Carbon;

class PriceController extends Controller
{
    use ApiMotbit;
    protected $model = 'Price';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:prices,id|max:255',
        ]);
        $rs = [
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'price' => $request->input('price', ''),
            'slug' => $request->input('slug', ''),
            'excerpt' => $request->input('excerpt', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', 0),
            'type' => 'page'
        ];
      
        return $rs;
    }
    public function listPrice(){
        $model = $this->getModel();

        $prices=$model->get();
        $pricenew =$model->orderBy('created_at','DESC')->take(4)->get();
        return view('themes.mspace.prices.list',compact('prices','pricenew'));

        // $prices=$model->paginate(12);
        // return view('themes.mspace.prices.list',compact('prices'));

    }
    public function detailPrice($slug){
        Carbon::setLocale('vi'); 
        Carbon::now('Asia/Ho_Chi_Minh');
        $model = $this->getModel();
        $prices = $model->where('slug',$slug)->first();
        if (!empty($pries)) {
            abort(404);
        }
        $all= $model->take(5)->get();
        return view('themes.mspace.prices.detail',compact('prices','all'));

    }

}
