<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();
        \DB::table('settings')->insert([
            'key' => 'facebook',
            'name' => 'facebook',
            'value' => 'https://www.facebook.com/dichvuvesinhgreenhouse/',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'twitter',
            'name' => 'twitter',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'instagram',
            'name' => 'instagram',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'linkedin',
            'name' => 'linkedin',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'pinterest',
            'name' => 'pinterest',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'youtube',
            'name' => 'youtube',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'rss',
            'name' => 'rss',
            'value' => '#',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'tru-so-vp',
            'name' => 'tru-so-vp',
            'value' => 'Trụ sở VP chính: Số 10 Phan Huy Chú - Hoàn Kiếm - Hà Nội',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'van-phong-giao-dich',
            'name' => 'van-phong-giao-dich',
            'value' => 'Tầng 7, P711 Toà nhà 8C, 30 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'dien-thoai',
            'name' => 'dien-thoai',
            'value' => '098.868.3339',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'fax',
            'name' => 'fax',
            'value' => '024 36230355',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
        [
            'key' => 'email',
            'name' => 'email',
            'value' => 'nhaxanh.hn@gmail.com',
            'details' => '',
            'type' => 'string',
            'order' => 1,
            'group' => ''

        ],
    );
    }
}
