<?php

use Illuminate\Database\Seeder;

class SettingMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('setting_menu')->delete();
        \DB::table('setting_menu')->insert([
            'dich_vu' => 1,
            'du_an' => 1,
            'khach_hang' => 1,
            'tin_tuc' => 1,
            'tuyen_dung' => 1,
            'lien_he' => 1,
            'bao_gia' => 1,
            'gioi_thieu' => 1,
            'lanh_dao' => 1,
            'header' => 1,
            'slogan' => 1,
            'tai_sao' => 1,
            'slide' => 1,
            'instagram' => 1,
            'footer' => 1,

        ]);
    }
}
