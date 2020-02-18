<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\CustommerTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\Custommer;
use App\Http\Requests\Admin\ValidatePostRequest;

class CustommerTableController extends Controller
{
    use Datatable;
    protected $tableClass = CustommerTable::class;

    public function destroy(Custommer $custommer)
    {
        $custommer->delete();
        return [
            'message' => __('The Custommer was successfully deleted'),
            'redirect' => 'admin.custommers',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' CustommerTableController-> store');
        }
        $custommer = Custommer::create($request->all());

        return [
            'message' => __('The custommer was successfully created'),
            'redirect' => 'admin.custommer.edit',
            'param' => ['custommer' => $custommer->id],
        ];
    }
    public function show(Custommer $custommer) {
        return ['custommer', $custommer];
    }

    // public function edit(Service $service, PostForm $form) {
    //     return ['form' => $form->edit($service)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}