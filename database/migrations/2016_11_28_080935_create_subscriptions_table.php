<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    if (Schema::hasTable('subscriptions') == false ) {
        Schema::create('subscriptions', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->integer('plan_id');
            $table->integer('user_id');
            $table->integer('payment_id')->nullable();
            $table->integer('caveats_balance'); 
            $table->boolean('approved')->default(false);
            $table->date('trial_start_date')->nullable();
            $table->date('trial_end_date')->nullable();  
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();       

            //Timestamps
            $table->timestamps();
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
        //
        Schema::dropIfExists('users');
    }
}
