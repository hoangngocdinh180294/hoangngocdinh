<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\EmployeeTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Models\Employee;
use App\Http\Requests\Admin\ValidatePostRequest;

class EmployeeTableController extends Controller
{
    use Datatable;
    protected $tableClass = EmployeeTable::class;

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return [
            'message' => __('The Employee was successfully deleted'),
            'redirect' => 'admin.employees',
        ];
    }

    public function create(PostForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' EmployeeTableController-> store');
        }
        $post = Employee::create($request->all());

        return [
            'message' => __('The post was successfully created'),
            'redirect' => 'admin.post.edit',
            'param' => ['post' => $post->id],
        ];
    }
    public function show(Employee $employee) {
        return ['employee', $employee];
    }

    public function edit(Employee $employee, PostForm $form) {
        return ['form' => $form->edit($employee)];
    }
}
