<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_social') == false ) {
            Schema::create('user_social', function (Blueprint $table) {
           
            //Columns
            $table->increments('id');
            $table->integer('user_id');
            $table->string('email', 20);
            $table->string('provider', 20);
            $table->string('provider_id', 20);      
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
       Schema::dropIfExists('user_social');
    }
}
