<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCaveats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_caveats') == false ) {
            Schema::create('user_caveats', function (Blueprint $table) {
           
            //Columns
            $table->increments('id');
            $table->string('email');
            $table->integer('caveat_id');
            
            });
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_caveats');
    }
}
