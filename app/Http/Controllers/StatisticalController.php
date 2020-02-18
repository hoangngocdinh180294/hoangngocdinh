<?php

namespace App\Http\Controllers;

use App\Traits\{ApiMotbit, View};
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use ApiMotbit;

    public function report()
    {
        $count_posts = $this->getModel('Post')->post()->active()->count();
        $count_users = $this->getModel('User')->count();
        $count_subscribers = $this->getModel('Subscriber')->count();
        $count_contacts = $this->getModel('CustomerContact')->count();
        $count_projects = $this->getModel('Project')->count();
        $new_subscribers= $this->getModel('Subscriber')->orderBy('created_at', 'desc')->take(5)->get();
        $new_contacts= $this->getModel('CustomerContact')->orderBy('created_at', 'desc')->take(5)->get();
        return compact(
    'count_posts',
            'count_users',
            'count_contacts',
            'count_subscribers',
            'count_projects',
            'new_subscribers',
            'new_contacts'
            );
    }
}
