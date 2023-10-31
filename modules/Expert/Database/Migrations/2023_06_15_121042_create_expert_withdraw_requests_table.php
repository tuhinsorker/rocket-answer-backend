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

        Schema::create('expert_withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->float('request_amount', 10, 2);
            $table->date('request_date');
            $table->tinyInteger('is_approve')->default(0);
            $table->integer('approve_by');
            $table->dateTime('approved_date');
            $table->integer('card_type_id');
            $table->string('card_number', 50);
            $table->string('valid_date', 10);
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
        Schema::dropIfExists('expert_withdraw_requests');
    }
};
