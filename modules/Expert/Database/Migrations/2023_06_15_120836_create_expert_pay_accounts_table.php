<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_pay_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->integer('card_type_id');
            $table->integer('payment_method_id');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('card_number', 50);
            $table->date('valid_date');
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
        Schema::dropIfExists('expert_pay_accounts');
    }
};
