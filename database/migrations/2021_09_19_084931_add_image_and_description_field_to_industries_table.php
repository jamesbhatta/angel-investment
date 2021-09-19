<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageAndDescriptionFieldToIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industries', function (Blueprint $table) {
            $table->integer('position')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industries', function (Blueprint $table) {
            //
        });
    }
}
