<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'tasks_id';
    protected $table = 'tasks';

    protected $fillable = [
        'task',
        'due_date',
        'time',
        'task_type',
        'subject',
    ];

    protected $attributes = [
        'task_points' => '50',
        'task_id' => '{{$this->list()->task_id}}'
    ];

    public function list()
    {
        return $this->belongsTo('App\Models\ToDoList', 'task_id', 'task_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
