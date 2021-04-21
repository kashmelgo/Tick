<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('tasks_id');
            $table->integer('task_id');
            $table->string('task');
            $table->date('due_date');
            $table->time('time');
            $table->enum('task_type',['Assignment','Project']);
            $table->string('subject');
            $table->enum('status',['done','unfinished','overdue'])->default('unfinished');
            $table->date('date_finished')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
