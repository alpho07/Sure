<?php

use Illuminate\Database\Seeder;

class Po_PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Po_Plans::class, 10)->create();
    }
}
