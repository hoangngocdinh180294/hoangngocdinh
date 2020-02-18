<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use App\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Auth, Hash;
use Carbon\Carbon;
use App\Traits\ApiMotbit;
class PostController extends Controller
{
    use ApiMotbit;
    protected $model = 'Post';
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
            'excerpt' => $request->input('excerpt', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', ''),
            'order' => $request->input('order', ''),
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
        $categories = $request->input('categories', []);
        if (is_array($categories)) {
            $data->categories()->sync($categories);
        }
    }
    public function resultOne($request, $data)
    {
        $data->load(['categories', 'author']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['categories', 'author']);
        return $data;
    }

    public function additionQuery($model) {
        $model = $model->where('type', 'post');
        return $model;
    }

    public function detail(Request $request, $slug)
    {
        $model = $this->getModel();
        $post = $model::where(['slug' => $slug, 'status' => 1])
            ->first();
            if (empty($post)) {
                return view('themes.mspace.errors.404');
            }
        if($post && $post->type == 'post') {
            $post->load(['categories', 'author','tags']);
            $categories = $this->getModel('Category')->orderBy('created_at')->take(5)->get();
            $postsNew= $model->orderBy('created_at','ASC')->active()->post()->limit(5)->get();
                
    //              $post->attachTags(['tai','uu','pad','new','ban']);
    if (empty($post)) {
        abort(404);
        }
            $categoryIds = $post->categories()->pluck('id')->all();
            $relatedPosts = $this->getModel('Post')->active()->post()
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('id', $categoryIds);
            })->limit(6)->get();
            

            $count= $relatedPosts->count();
            return view('themes.mspace.posts.detail',compact('post','postsNew','relatedPosts','categories','count'));
        }
        elseif ($post && $post->type == 'page') {
            return $this->loadView('pages.detail', compact('post'));
        }
    }
    public function getDetailPost($slug)
    {

        $model = $this->getModel();
        $post = $model->where('slug', $slug)->get();
        $categories = $this->getModel('Category')->orderBy('created_at')->take(5)->get();
//      $post_id = $post[0]->id;
//      $post_category=PostCategory::where('post_id',$post_id)->get();
//      $categoryIds = $post->categories()->pluck('id')->all();
//      $relatedPosts = $this->getModel('Post')->whereHas('categories', function ($query) use ($categoryIds) {
//            $query->whereIn('id', $categoryIds);
//        })->limit(12)->get();
//        echo $categoryIds;
        return view('themes.mspace.posts.detail', compact('post','categories'));
    }
    //get List Post
    public function getListPost()
    {
       Carbon::setLocale('vi'); // set langguge Vietnam
       Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        // set Model
       $model           = $this ->getModel();
       $model_cate      = $this ->getModel("Category");
       $all_posts =   $model->orderBy('created_at','DESC') -> post()->active()->paginate(8);
       $all_posts_new =   $model->post()->active()->take(4)->get();
        //get list cate
        $all_cates  =   $model_cate->all();
        // dd($list);
        $categories = $this->getModel('Category')->orderBy('created_at')->take(5)->get();
        // View
        return  $this->loadView('posts.list',compact('all_posts', 'all_cates','categories','all_posts_new'));

    }   
    public function listCate($slug){
        // set Model
        $model_cate     =   $this -> getModel("Category");
        $model_post     =   $this -> getModel("Post");
        $model_post_cate=   $this -> getModel("PostCategory");
        // find ID of category
        $cate_id = $model_cate->where('slug', $slug)->first();
        $all_posts =  $model_post->orderBy('created_at','DESC') -> post()->active()->paginate(12);
     if(empty($cate_id)){
         abort(404);
        }
        // get list Category
        $list      =   $model_cate->all();
        // get name category
        $cate_name =   $cate_id->name;
        // Set category_id  of  table post_categories with ID of category
        $cate      =   $model_post_cate ->where('category_id',$cate_id->id)->get();
        // Set ID post with ID of post_id of tabel post_catagories
        $id_post   =   $model_post  ->whereIn('id',$cate->pluck('post_id')->toArray())->post()->active()->paginate(12);
        $count    = $id_post->total();
        // get news other news lasted
        $other_latest     =   $model_post->post()->active()->orderBy('created_at', 'DESC')->paginate(8);      
        // View
        return  $this->loadView('posts.category',compact('id_post','all_posts','cate_name','list','other_latest','count'));
    }
}
