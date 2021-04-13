<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task');
            $table->date('due_date');
            $table->time('time');
            $table->enum('task_type',['Assignment','Project']);
            $table->string('subject');
            $table->enum('status',['done','unfinished','overdue'])->default('unfinished');
            $table->date('date_finished')->default(NULL);
            $table->integer('task_points');
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
        Schema::dropIfExists('task');
    }
}
