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

        Schema::create('expert_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->integer('doc_type_id');
            $table->string('doc_number', 50);
            $table->date('doc_valid_date');
            $table->string('doc_path', 255);
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
        Schema::dropIfExists('expert_documents');
    }
};
