<?php

namespace App\Http\Controllers;
use App\Traits\{ApiMotbit, View};
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use ApiMotbit, View;
    protected $model = 'Slides';
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $slides = $this->getModel('Slide')->orderBy('created_at')->take(10)->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();

        // $testimonials = $this->getModel('Testimonial')->orderBy('created_at')->take(4)->get();
        $services=$this->getModel('Service')->orderBy('created_at','DESC')->take(9)->get();

        // $testimonials = $this->getModel('Testimonial')->orderBy('created_at')->take(4)->get();
        $custommer = $this->getModel('Custommer')->orderBy('created_at')->get();
        // $services=$this->getModel('Service')->orderBy('created_at')->take(6)->get();

    
        $projects = $this->getModel('Project')->active()->orderBy('created_at', 'DESC')->take(8)->get();
        $projects1 = DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('projects.project_category_id', 1)
                    ->where('status',1)
                    ->orderBy('projects.created_at', 'DESC')
                    ->take(5)
                    ->get();
        $projects2 = DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('projects.project_category_id', 2)
                    ->where('status',1)
                    ->orderBy('projects.created_at', 'DESC')
                    ->take(5)
                    ->get();
        $projects3 = DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('projects.project_category_id', 3)
                    ->where('status',1)
                    ->orderBy('projects.created_at', 'DESC')
                    ->take(5)
                    ->get();
        $projects4 = DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('projects.project_category_id', 4)
                    ->where('status',1)
                    ->orderBy('projects.created_at', 'DESC')
                    ->take(5)
                    ->get();
        
        $posts = $this->getModel('Post')->where('type','=','post')->orderBy('created_at','DESC')->active()->take(6)->get();
        $cate_post=$this->getModel('Category')->orderBy('created_at','DESC')->get();
        $post_1 = $this->getModel('Post')->where('order','=',1)->active()->take(1)->get();
        $post_2 = $this->getModel('Post')->where('order','=',2)->active()->take(1)->get();
        //  $post_3 = $this->getModel('Post')->where('order','=',3)->active()->take(10)->get();
        $post_other = $this->getModel('Post')->where('type','=','post')->orderBy('created_at','DESC')->whereNotIn('id',$posts->pluck('id')->toArray())->active()->take(6)->get();
        $employee = $this->getModel('Employee')->get();
        $projects_image = DB::table('projects')->join('project_images','projects.id','=','project_images.project_id')->select('projects.*','project_images.image')->take(6)->get();
        $prince = $this->getModel('Price')->orderBy('created_at','DESC')->take(6)->get();
        // dd($projects_image->projectimages[0]);
        $pages = $this->getModel('Post')->where('type','=','page')->orderBy('created_at','DESC')->active()->take(6)->get();
        return $this->loadView('home.index', compact('slides', 'projects', 'projects1', 'projects2', 'projects3', 'projects4', 'posts','post_other','services','cate_post','post_1','post_2',  'employee','pages','project_categoris','projects_image','custommer','prince'));
    }
}
