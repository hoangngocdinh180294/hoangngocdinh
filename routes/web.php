<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$myRoutes = [
    'users' => 'User',
    'posts' => 'Post',
    'categories' => 'Category',
    'pages' => 'Page',
    'projects' => 'Project',
    'settings' => 'Setting',
    'list-slides' => 'ListSlide',
    'services' => 'Service',
    'testimonials' => 'Testimonial',
    'subscribers'=>'Subscriber',
    'customercontacts'=>'CustomerContact',
    'tags' => 'Tag',
    'projectcategories' => 'ProjectCategory',
    'employees' => 'Employee',
    'custommers' => 'Custommer',
    'prices' => 'Price',
    'recruitments' => 'Recruitment',
    'settingmenus' => 'SettingMenu'
];
$segmentRoutes = [
    "users" => 'user',
    'posts' => 'post',
    'categories' => 'category',
    'projectcategories' => 'projectcategorie',
    'pages' => 'page',
    'projects' => 'project',
    'settings' => 'setting',
    'list-slides' => 'list-slide',
    'services' => 'service',
    'testimonials' => 'testimonial',
    'subscribers' => 'subscriber',
    'customercontacts' => 'customercontact',
    'tags' => 'tag',
    'comments' => 'comment',
    'products' => 'product',
    'productcategories' => 'productcategorie',
    'orderdetails' => 'orderdetail',
    'orders' => 'order',
    'producttypes' => 'producttype',
    'catalogs' => 'catalog',
    'partners' => 'partner',
    'uploads' => 'upload',
    'menu' => 'menu',
    'servicecategories' => 'servicecategory',
    'employees' => 'employee',
    'custommers' => 'custommer',
    'prices' => 'price',
    'recruitments' => 'recruitment',
    'settingmenus' => 'settingmenu'
];
/**
 * handler router for admin data table
 */
Route::namespace('Admin')->group(function() use ($myRoutes, $segmentRoutes) {
    foreach ($myRoutes as $key => $value) {
        Route::prefix($key)->as($key.'.')->middleware('auth')->group(function () use ($key, $value, $segmentRoutes) {
            // post.initTable
            Route::get('initTable', $value.'TableController@init')->name('initTable');
            // post.tableData
            Route::get('tableData', $value.'TableController@data')->name('tableData');
            // post.create
            Route::get('create', $value.'TableController@create')->name('create');
            // post.destroy
            Route::delete('{'.$segmentRoutes[$key].'}', $value.'TableController@destroy')->name('destroy');
            // post.edit
            Route::get('edit/{'.$segmentRoutes[$key].'}', $value.'TableController@edit')->name('edit');
            Route::get('read/{'.$segmentRoutes[$key].'}', $value.'TableController@read')->name('read');
        });
    }
});

Route::get('/tim-kiem-dich-vu', ['uses' => 'SearchController@search', 'as' => 'posts.search']);
Route::get('/tim-kiem-tin-tuc', ['uses' => 'SearchController@searchtintuc', 'as' => 'posts.searchtintuc']);
Route::get('/tim-kiem-bang-gia', ['uses' => 'SearchController@searchbanggia', 'as' => 'prices.searchbanggia']);
Route::get('/tin-tuc','PostController@getListPost')->name('post');
Route::get('/chuyen-muc/{slug}','PostController@listCate')->name('cate_post');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/lien-he', 'ListCustomerContactController@contact')->name('contact');

Route::post('/lien-he', 'ListCustomerContactController@postContact')->name('addcontact');

Route::post('/subscribe', 'SubscriberController@postSubscriber')->name('addSub');
Route::post('/postemail','ComposerServiceProvider@ajaxPost')->name('emailajax');

Route::get('/contact', function () {
    return  App\Helpers\Theme::view('contact');
});


/** Nguyen route */
Route::get('/du-an','ServiceController@getService')->name('services');
Route::get('/du-an/{link}','ServiceController@detailService')->name('detail_service');
/** End Nguyen route */

/** Tai route */

/** End Tai route */
Route::get('/gioi-thieu','IntroduceController@getIntro')->name('introduce');

/** Anh route */

Route::get('/dich-vu','ProjectController@getProject')->name('project');
Route::get('/dich-vu/{slug}','ProjectController@detailProject')->name('detail_project');
Route::get('/danh-muc-dich-vu/{slug}','ProjectController@listCate')->name('cate_dichvu');


Route::get('/khach-hang','CustommerController@listCustommer')->name('custommer');
Route::get('/khach-hang/{slug}','CustommerController@detailCustommer')->name('detail_custommer');

/** End Anh route */
Route::post('/postcontact','ListCustomerContactController@ajaxPost')->name('contactajax');
// Route::get('/test','ListCustomerContactController@viewForm')->name('contactajax');


Route::get('/bang-gia-dich-vu','PriceController@listPrice')->name('price');
Route::get('/bang-gia-dich-vu/{slug}','PriceController@detailPrice')->name('detail_price');

Route::get('/tuyen-dung','RecruitmentController@listRecruitment')->name('recruitment');
Route::get('/tuyen-dung/{slug}','RecruitmentController@detailRecruitment')->name('detail_recruitment');

Route::get('/p/{page}', ['uses' => 'PageController@detail', 'as' => 'pages.detail']);

// Route::get('/admin/login', function () {
//     return view('admin.signin');
// });

Route::get('/admin/test', function () {
    return view('admin.main');
});

Route::get('/admin/{any?}', function () {
    return view('admin.index');
})->where('any', '.*');

// Auth::routes();
Route::prefix('ajax')->group(function () use ($myRoutes) {
    Route::post('/login', 'Auth\LoginController@login')->name('ajax.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('ajax.logout');
    Route::get('/users/checklogin', 'UserController@checkLogin')->name('ajax.login.check');
    Route::get('/statisticals', 'StatisticalController@report')->name('ajax.report');

    foreach ($myRoutes as $key => $value) {
        Route::post('/' . $key, $value . 'Controller@store')->name('ajax.' . $key . '.create')->middleware('auth');
        Route::get('/' . $key, $value . 'Controller@list')->name('ajax.' . $key . '.list')->middleware('auth');
        Route::get('/' . $key . '/paginate', $value . 'Controller@get')->name('ajax.' . $key . '.paginate')->middleware('auth');
        Route::get('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@show')->name('ajax.' . $key . '.get')->middleware('auth');
        Route::patch('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@update')->name('ajax.' . $key . '.update')->middleware('auth');
        Route::delete('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@destroy')->name('ajax.' . $key . '.delete')->middleware('auth');

    }
});




Route::get('/{post}', ['uses' => 'PostController@detail', 'as' => 'posts.detail']);

Route::get('posts/{slug}','PostController@getDetailPost')->name('postdetail');

/* Tai route */


Route::get('tag/list/{id}','TagController@getList');

/* End Tai route */
