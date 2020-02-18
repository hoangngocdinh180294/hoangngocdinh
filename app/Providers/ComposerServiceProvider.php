<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\Theme as ViewHelpers;
use View;

use App\Models\Post;
use App\Models\Email;
use App\Models\Project;
use App\Models\Setting;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $postsnew = Post::with(['categories', 'author'])
                ->orderBy('created_at', 'desc')->limit(12)->get();
                $view->with(compact('postsnew'));
        });

      \View::composer(
        [
            ViewHelpers::viewPath('sections.posts'),
            ViewHelpers::viewPath('home.sections.post'),
        ],
        'App\Http\ViewComposers\PostsComposer'
      );

      \View::composer(
        [
            ViewHelpers::viewPath('elements.recent_posts')
        ],
        'App\Http\ViewComposers\RecentPostsComposer'
      );
      // \View::composer(
      //   [
      //       ViewHelpers::viewPath('elements.project')
      //   ],
      //   'App\Http\ViewComposers\ProjectComposer'
      // );

        view()->composer('*', function ($view) {
             $emailfooters = Email::all();

             $view->with(compact('emailfooters'));
        });
    
        view()->composer('themes.mspace.home.section.header', function ($view) {
            $post = Post::orderby('created_at','DESC')->get();
            $view->with(compact('post'));
        });
    }
    public function ajaxPost(Request $req){
        //dd($req->all());

        $flight = new f_email;
        $flight->email = $req->email;
        $flight->save();
            

        return response()->json($req->all());

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
}