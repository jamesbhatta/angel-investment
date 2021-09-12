<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->uuid('pitch_id')->nullable();
            $table->string('title');
            $table->integer('amount');
            $table->string('charge_key')->nullable();
            $table->string('payment_id')->nullable();
            $table->boolean('payment_status')->nullable();
            $table->string('package_name')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_country')->nullable();
            $table->text('transaction_detail')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
