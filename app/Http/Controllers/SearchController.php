<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
class SearchController extends Controller
{  
  use ApiMotbit;
    function search(Request $request){
      $model           = $this ->  getModel("Project");
        $key=$request->get('s');
        $post = $model->where('title','like','%'.$key.'%')->active()->paginate(12);
        $projectNew = \DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('status',1)
                    ->orderBy('projects.created_at','DESC')
                    ->take(4)
                    ->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();
        $count = $post->total();
        return  $this->loadView('posts.search',
        compact('key', 'post', 'count','projectNew','project_categoris'));
      }
      function searchtintuc(Request $request) {
        $model           = $this ->getModel("Post");
        $key=$request->get('s');
        $post = $model->where('title','like','%'.$key.'%')->active()->paginate(12);

        $all_posts_new =   $model->post()->active()->take(4)->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();
        $count = $post->total();
        return  $this->loadView('posts.searchtintuc',
        compact('key', 'post', 'count','project_categoris','all_posts_new'));
      }
      function searchbanggia(Request $request) {
        $model           = $this ->getModel("Price");
        $key=$request->get('s');
        $post = $model->where('title','like','%'.$key.'%')->paginate(12);

        $all_posts_new =   $this->getModel('Price')->take(4)->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();
        $count = $post->total();
        return  $this->loadView('prices.search',
        compact('key', 'post', 'count','project_categoris','all_posts_new'));
      }

      
}
