<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectImageSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostCateSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(SettingMenuSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
