<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'tasks_id';
    public function list()
    {
        return $this->belongsTo('App\Models\ToDoList', 'task_id', 'task_id');
    }
}
