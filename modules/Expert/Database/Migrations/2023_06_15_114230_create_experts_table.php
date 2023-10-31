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

        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('full_name', 150);
            $table->string('display_name', 150);
            $table->string('email', 50);
            $table->string('phone', 20);
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->decimal('rank_no', 8, 2);
            $table->date('dob');
            $table->integer('country_id');
            $table->tinyInteger('security_alert')->default(1);
            $table->text('expert_in_bio');
            $table->integer('user_id');
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
        Schema::dropIfExists('experts');
    }
};
