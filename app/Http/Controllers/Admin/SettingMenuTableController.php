<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingMenu;
use App\User;
use App\Tables\Builders\Admin\SettingMenuTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Http\Requests\Admin\ValidatePostRequest;

class SettingMenuTableController extends Controller
{
    use Datatable;
    protected $tableClass = SettingMenuTable::class;

    public function edit(SettingMenu $settingmenu, PostForm $form) {
        return ['form' => $form->edit($settingmenu)];
    }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
