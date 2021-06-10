<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id('level_id');
            $table->integer('level');
            $table->integer('experience_needed');
            $table->string('foreground_color');
            $table->string('background_color');
            $table->timestamps();
        });

        //Insert some stuff
        for($x=0, $y=200; $x<50; $x++, $y+=150){
            DB::table('levels')->insert(
                array(
                    'level' => $x+1,
                    'experience_needed' => $y,
                    'foreground_color' => 'black',
                    'background_color' => 'white',
                )
                );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
