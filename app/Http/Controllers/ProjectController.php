<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\ProjectImage;
use App\Models\Partner;
use Carbon\Carbon;
class ProjectController extends Controller
{
    use ApiMotbit;
    protected $model = 'Project';
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
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', 0),
            'project_category_id' => $request->input('projectcategories', ''),
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
            $rs['author_id'] = $user_id;
        }
        return $rs;
    }
    public function processAfterSave($request, $data)
    {
        // $categories = $request->input('projectcategories', []);
        // if (is_array($categories) && count($categories)) {
        //     $data->projectcategories()->sync($categories);
        // }

        $images = $request->input('images', []);
        $filterImages = array_filter($images, function($el) { return !empty($el['image']);});
        if(count($filterImages)) {
            $processImages = array_map(function($el) use ($data) {
                if (empty($el['project_id'])) {
                    $el['project_id'] = $data->id;
                }
                return $el;
            }, $filterImages);
            $this->proccesRelationWithRequest(
                $data->images(),
                $processImages
            );
        }
    }
    public function resultOne($request, $data)
    {
        $data->load(['projectcategories', 'author', 'images']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['projectcategories', 'author']);
        return $data;
    }
    public function getProject()
    {
        $model = $this->getModel();
        // $projectimages = $model->with('projectimages')->get();
        // $project=$model->active()->orderBy('created_at')->paginate(8);
        // $model_cate = $this->getModel("ProjectCategory");
        // $cate = $model_cate->with('projects')->orderBy('created_at')->get();
        // $partners= $this->getModel('Partner')->active()->orderBy('created_at')->get();

        // $project = $model->with('projectimages')->active()->orderBy('created_at')->paginate(8);
        // dd($project);
        $project = \DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('status',1)
                    ->orderBy('projects.created_at')
                    ->take(8)
                    ->paginate(8);
        $projectNew = \DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('status',1)
                    ->orderBy('projects.created_at','DESC')
                    ->take(4)
                    ->get();
        $project_categoris = $this->getModel('ProjectCategory')->orderBy('created_at')->take(4)->get();
        return view('themes.mspace.project.list', compact('project', 'projectNew', 'project_categoris'));
    }
    public function detailProject($slug)
    {
        Carbon::setLocale('vi'); 
        Carbon::now('Asia/Ho_Chi_Minh');
        $model = $this->getModel();
        // $projectother = $model->with('images')->orderBy('created_at','DESC')->take(4)->get();
        $projectother = \DB::table('projects')
                    ->join('project_images', 'projects.id', '=', 'project_images.project_id')
                    ->where('status',1)
                    ->orderBy('projects.created_at','DESC')
                    ->take(4)
                    ->get();
        $project = $model->with('projectimages')->where('slug',$slug)->first();
        // dd($project);
        $model_cate     =   $this -> getModel("ProjectCategory");
        $cate=$model_cate->orderBy('created_at')->get();
        if (empty($project)) {
            abort(404);
        }
        return view('themes.mspace.project.detail',compact('project','cate','projectother'));

    }
    public function listCate($slug){
        // set Model
        $model_cate     =   $this -> getModel("ProjectCategory");
        $cate=$model_cate->orderBy('created_at')->get();
        $model_project     =   $this -> getModel("Project");
        // find ID of category
        $cate_id = $model_cate->where('slug', $slug)->first();
     if(empty($cate_id)){
        return redirect()->route('project');
        }
        // get list Category
        $list      =   $model_cate->all();
        // get name category
        $cate_name =   $cate_id->name;
        $project   =   $model_project->where('project_category_id',$cate_id->id)->paginate(6);
        $count    = $project->total();
        // dd($project);
        return  view('themes.mspace.project.category',compact('cate_id','project','cate_name','list','count','cate'));
    }
}
