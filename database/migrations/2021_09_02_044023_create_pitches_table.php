<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('website')->nullable();
            $table->string('company_country')->nullable();
            $table->string('mobile')->nullable();
            $table->string('industry')->nullable();
            $table->string('stage')->nullable();
            $table->string('investor_role')->nullable();
            $table->string('currently_invested')->nullable();
            $table->string('max_investment')->nullable();
            $table->string('capital')->nullable();
            $table->string('min_investment')->nullable();
            $table->string('tax_relief_type')->nullable();
            $table->text('short_summary')->nullable();
            $table->text('the_business')->nullable();
            $table->text('the_market')->nullable();
            $table->text('progress')->nullable();
            $table->text('objectives')->nullable();
            $table->text('team_overview')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('pitches');
    }
}
