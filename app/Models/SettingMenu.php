<?php

namespace App\Models;

class SettingMenu extends MotbitModel
{
    protected $table = 'setting_menu';
    protected $fillable = ['dich_vu','du_an','khach_hang','tin_tuc','bao_gia','lanh_dao','gioi_thieu','lien_he','tuyen_dung','slide','header','tai_sao','slogan','instagram','footer'];
    public $timestamps = false;
}
