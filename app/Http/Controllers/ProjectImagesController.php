<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
class ProjectImagesController extends Controller
{
    //
    use ApiMotbit;
    protected $model = 'ProjectImage';
    public function project(){
        $this->belongsTo('App\Models\Project');
    }
}
