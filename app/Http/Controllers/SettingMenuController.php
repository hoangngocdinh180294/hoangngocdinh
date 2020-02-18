<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\SettingMenu;
class SettingMenuController extends Controller
{
    use ApiMotbit;
    protected $model = 'SettingMenu';
    public function processInputs($request)
    {
        $rs = [
            'gioi_thieu' => $request->input('gioi_thieu', 0),
            'dich_vu' => $request->input('dich_vu', 0),
            'du_an' => $request->input('du_an', 0),
            'khach_hang' => $request->input('khach_hang', 0),
            'tin_tuc' => $request->input('tin_tuc', 0),
            'bao_gia' => $request->input('bao_gia', 0),
            'lanh_dao' => $request->input('lanh_dao', 0),
            'lien_he' => $request->input('lien_he', 0),
            'tuyen_dung' => $request->input('tuyen_dung', 0),
            'slide' => $request->input('slide', 0),
            'header' => $request->input('header', 0),
            'tai_sao' => $request->input('tai_sao', 0),
            'slogan' => $request->input('slogan', 0),
            'instagram' => $request->input('instagram', 0),
            'footer' => $request->input('footer', 0)
        ];
        return $rs;
    }
   
}
