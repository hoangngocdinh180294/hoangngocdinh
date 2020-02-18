<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Email;
class EmailsComposer
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
      $posts = Email::all()->get();
      $view->with(compact('posts'));
    }
}
