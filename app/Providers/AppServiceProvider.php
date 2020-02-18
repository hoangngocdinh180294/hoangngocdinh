<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\{Post, Price, ProjectCategory,Project,SettingMenu};
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $postheader = Post::orderby('created_at','DESC')->post()->get();
            $cate_dichvu=ProjectCategory::orderBy('created_at')->get();
            $dichvu_new = Project::orderBy('updated_at')->take(3)->get();
            $pricecomposer = Price::orderBy('updated_at')->take(6)->get();
            $setting_menu = SettingMenu::orderby('id','DESC')->first();
            $view->with(compact('postheader','cate_dichvu', 'dichvu_new','pricecomposer','setting_menu'));
        });
    }
}
