<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacetypeVisitinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placetype_visitinformation', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('placetype_id')->unsigned()->nullable();
          $table->foreign('placetype_id')->references('id')->on('placetypes')->onDelete('restrict');
        //  $table->foreign('placetype_id')->references('id')->on('placetypes');
          $table->integer('visitinformation_id')->unsigned()->nullable();
          $table->foreign('visitinformation_id')->references('id')->on('visitinformations')->onDelete('restrict');
          //$table->foreign('visitinformation_id')->references('id')->on('visitinformations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placetype_visitinformation');
    }
}
