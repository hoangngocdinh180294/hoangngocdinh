<?php

use Illuminate\Database\Seeder;

class PostCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PostCategory::class,30)->create();
    }
}
