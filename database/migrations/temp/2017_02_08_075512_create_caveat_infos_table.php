<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaveatInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caveat_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Receipt_date')->default(NULL);
            $table->string('Upload_path', 100)->default(NULL);
            $table->string('Lands_office', 50)->default(NULL);
            $table->string('Affidavit_date', 50)->default(NULL);
            $table->string('Present_lawyer', 50)->default(NULL);
            $table->string('PcertNo', 50)->default(NULL);
            $table->string('Address', 50)->default(NULL);
            $table->string('Email', 50)->default(NULL);
            $table->string('Mobile', 50)->default(NULL);
            $table->integer('Cid');
            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caveat_infos');
    }
}
