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

        Schema::create('expert_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_category_id');
            $table->string('name', 50);
            $table->string('code', 20);
            $table->tinyInteger('is_active')->default(1);
            $table->string('icon_path', 200)->nullable();
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
        Schema::dropIfExists('expert_sub_categories');
    }
};
