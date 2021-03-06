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
            $table->timestamps();
        });

        //Insert some stuff
        for($x=1, $y=0; $x<=50; $x++, $y+=150){
            DB::table('levels')->insert(
                array(
                    'level' => $x,
                    'experience_needed' => $y,
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
