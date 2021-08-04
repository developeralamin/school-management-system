<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_points', function (Blueprint $table) {
            $table->id();
            $table->string('grade_name');
            $table->string('grade_point');
            $table->string('start_marks');
            $table->string('end_marks');
            $table->string('start_point');
            $table->string('end_point');
            $table->string('remarks');
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
        Schema::dropIfExists('grade_points');
    }
}
