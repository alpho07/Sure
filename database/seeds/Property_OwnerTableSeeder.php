<?php

use Illuminate\Database\Seeder;

class Property_OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Property_Owner::class, 10)->create();
    }
}
