<?php

use Illuminate\Database\Seeder;

class CaveatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Caveats::class, 10)->create();
        
        /*->each(function($c){
            $c->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
