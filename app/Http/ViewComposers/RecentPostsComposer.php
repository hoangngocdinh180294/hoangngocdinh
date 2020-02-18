<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Post;
class RecentPostsComposer
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
    public function compose(View $view)
    {
      $recentPosts = Post::with(['categories'])
      ->post()->active()->orderBy('created_at', 'desc')->limit(12)->get();
      $view->with(compact('recentPosts'));
    }
}
