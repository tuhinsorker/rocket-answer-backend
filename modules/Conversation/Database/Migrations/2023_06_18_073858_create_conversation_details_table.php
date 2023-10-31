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
        Schema::create('conversation_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('conversation_id');
            $table->bigInteger('sender_id');
            $table->bigInteger('receiver_id');
            $table->text('message')->nullable();
            $table->tinyInteger('sender_status')->comment('0=unseen, 1=seen, 2=delete	')->nullable();
            $table->tinyInteger('receiver_status')->comment('0=unseen, 1=seen, 2=delete')->nullable();
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
        Schema::dropIfExists('conversation_details');
    }
};
