<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $primaryKey = 'list_id';
    public function plan()
    {
        return $this->hasMany('App\Models\Task', 'task_id', 'task_id');
    }
}
