<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id('user_detail_id');
            $table->integer('address_id')->unsigned();
            $table->string('fname');
            $table->string('lname');
            $table->string('image')->nullable();
            $table->integer('contact_num');
            $table->date('birthdate');
            $table->enum('gender',['Male','Female']);
            $table->enum('educational_attainment',['Highschool','College']);
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
        Schema::dropIfExists('user_details');
    }
}
