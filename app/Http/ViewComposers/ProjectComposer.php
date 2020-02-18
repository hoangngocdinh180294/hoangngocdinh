<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Project;
class ProjectComposer
{
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function project(View $view)
    { 
      $pro = Project::with(['projectimages'])->active()
      ->orderBy('created_at', 'desc')->limit(4)->get();
      $view->with(compact('pro'));
    }
}