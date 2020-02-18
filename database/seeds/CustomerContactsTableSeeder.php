<?php

use Illuminate\Database\Seeder;

class CustomerContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Customer_Contact::class,5)->create();
    }
}
