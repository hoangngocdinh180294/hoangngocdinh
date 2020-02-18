<?php

namespace App\Http\Controllers;
use App\Traits\ApiMotbit;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    use ApiMotbit;
    protected $model = 'Employee';
    public function getIntro()
    {
        $customer_contacts = $this->getModel('CustomerContact')->where('status',1)->orderBy('created_at','DESC')->take(6)->get();
        $pages = $this->getModel('Post')->where('type','=','page')->orderBy('created_at','DESC')->active()->take(6)->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();
        $employee = $this->getModel('Employee')->take(4)->get();
        return view('themes.mspace.layouts.introduce', compact('employee','project_categoris','pages','customer_contacts'));
    }
}
