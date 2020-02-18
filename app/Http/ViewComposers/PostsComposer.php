<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Post;
class PostsComposer
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
      $paging = isset($view->ipaging) ? $view->ipaging: 6;
      $posts = Post::with(['categories', 'author'])
      ->post()->active()->orderBy('created_at', 'desc')->paginate($paging);
      $view->with(compact('posts'));
    }
}
