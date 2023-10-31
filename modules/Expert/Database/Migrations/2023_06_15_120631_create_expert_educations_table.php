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

        Schema::create('expert_educations', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->string('degree', 150);
            $table->string('pass_year', 4);
            $table->string('institute_name', 150);
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
        Schema::dropIfExists('expert_educations');
    }
};
