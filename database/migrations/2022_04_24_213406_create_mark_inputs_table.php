<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name')->nullable();
            $table->string('student_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mark_Co_Ordinator')->nullable();
            $table->string('mark_SuperViser')->nullable();
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
        Schema::dropIfExists('mark_inputs');
    }
}
