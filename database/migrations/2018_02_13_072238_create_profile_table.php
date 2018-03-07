<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('phone')->nullable();       
            $table->string('gender')->nullable();
            $table->string('d_o_b')->nullable();
            $table->string('profile_pic')->default('default.jpg');            
            $table->string('customer_id')->nullable();            
            $table->timestamps();

            /* Assigning Foreign key */
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
