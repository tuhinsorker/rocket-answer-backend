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
        Schema::create('expert_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('expert_id');
            $table->integer('customer_id');
            $table->text('review');
            $table->decimal('rating', 8, 2);
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
        Schema::dropIfExists('expert_reviews');
    }
};
