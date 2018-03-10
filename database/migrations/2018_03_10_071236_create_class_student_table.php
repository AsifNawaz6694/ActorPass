<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {             
          $table->integer('class_id')->unsigned();
          $table->integer('student_id')->unsigned(); 
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
        Schema::table('class_student', function (Blueprint $table) {
            Schema::dropIfExists('class_student');
        });
    }
}
