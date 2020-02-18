<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('slides')->insert([
                'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                'description' => $faker->text,
                'image' => $faker->imageUrl($width = 1920, $height = 630),
                'created_by'=>$faker->randomDigitNotNull
            ]);
    }
    }
}
