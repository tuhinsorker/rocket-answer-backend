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

        Schema::create('expert_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->string('company_name', 150);
            $table->string('designation', 50);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('employer_name', 50);
            $table->string('employer_number', 20);
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
        Schema::dropIfExists('expert_jobs');
    }
};
