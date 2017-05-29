<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if (Schema::hasTable('plans') == false ) {
        Schema::create('plans', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->string('Plan_Name', 20)->default(NULL);
            $table->double('Annual_Rate',15, 8)->default(NULL);
            $table->double('Monthly_Rate',15, 8)->default(NULL);
            $table->integer('Notices')->default(NULL);
            $table->string('Plan_Details', 50)->default(NULL);        

            //Indexes
            //$table->primary('PlanID');       
         
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
        Schema::dropIfExists('plans');
    }
}
