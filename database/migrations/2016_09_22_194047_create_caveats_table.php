<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaveatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
     if (Schema::hasTable('caveats') == false ) {
        Schema::create('caveats', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->date('Caveat_Date')->default(NULL);
            $table->string('Caveat_Ref', 20)->default('');
            $table->string('Description', 50)->default(NULL);
            $table->string('Enquiry_Details', 50)->default(NULL);
            $table->string('LR_No', 50)->default('');
            $table->string('LRNo_Block', 50)->default('');
            $table->string('IR_IC_Nos', 50)->default(NULL);
            $table->string('Size', 50)->default(NULL)->comment('In Hectares');
            $table->string('Town', 50)->default(NULL);
            $table->string('Document_Uploads')->default(NULL);
            $table->date('Publish_date')->nullable();
            $table->boolean('Publish_status')->default(false); 
             $table->string('County', 50)->default(NULL);
            $table->string('Area', 50)->default(NULL);
            $table->string('Road', 50)->default(NULL);
            $table->string('Landmark', 50)->default(NULL);
            $table->string('Reason', 50)->default(NULL);
            $table->string('Who', 50)->default(NULL);  

            //Indexes      
            //$table->foreign('LR_No')->references('LRNo_Block')->on('property');

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
        Schema::dropIfExists('caveats');
    }
}
