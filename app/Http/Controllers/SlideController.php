<?php

namespace App\Http\Controllers;
use App\Traits\ApiMotbit;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    use ApiMotbit;
    protected $model = 'Slides';
    public function slides(){
       
        $slide=$this->getModel()->inRandomOrder()->take(10)->get();
        
        return view('themes.mspace.home.index',['slide'=>$slide]);
    }
}
