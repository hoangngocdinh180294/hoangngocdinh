<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\RecruitmentTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Models\Recruitment;
use App\Http\Requests\Admin\ValidatePostRequest;

class RecruitmentTableController extends Controller
{
    use Datatable;
    protected $tableClass = RecruitmentTable::class;

    public function destroy(Recruitment $recruitment)
    {
        $recruitment->delete();
        return [
            'message' => __('The Recruitment was successfully deleted'),
            'redirect' => 'admin.recruitments',
        ];
    }

    public function create(PostForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' RecruitmentTableController-> store');
        }
        $recruitment = Recruitment::create($request->all());

        return [
            'message' => __('The Recruitment was successfully created'),
            'redirect' => 'admin.recruitment.edit',
            'param' => ['recruitment' => $recruitment->id],
        ];
    }
    public function show(Recruitment $recruitment) {
        return ['recruitment', $recruitment];
    }

    public function edit(Recruitment $recruitment, PostForm $form) {
        return ['form' => $form->edit($recruitment)];
    }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
