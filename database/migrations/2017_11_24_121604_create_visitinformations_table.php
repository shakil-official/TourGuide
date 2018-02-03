<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitinformations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->text('description');
          $table->text('address');
          $table->integer('rating');
          $table->integer('place_id')->unsigned()->nullable();
          $table->foreign('place_id')->references('id')->on('places')->onDelete('restrict');
          $table->integer('admin_id')->unsigned()->nullable();
          $table->foreign('admin_id')->references('id')->on('admins')->onDelete('restrict');
          $table->integer('status')->default(1);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitinformations');
    }
}
