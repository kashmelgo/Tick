<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id('theme_id');
            $table->string('theme_name');
            $table->integer('cost');
            $table->timestamps();
        });


        DB::table('themes')->insert(
            array(
                'theme_name' => 'White',
                'cost' => '0',
            ));

        DB::table('themes')->insert(
            array(
                'theme_name' => 'Dark',
                'cost' => '1000',
            ));

        DB::table('themes')->insert(
            array(
                'theme_name' => 'Blue',
                'cost' => '5000',
            ));

        DB::table('themes')->insert(
            array(
                'theme_name' => 'Purple',
                'cost' => '8500',
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
