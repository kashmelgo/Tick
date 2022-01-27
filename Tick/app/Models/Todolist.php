<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $primaryKey = 'list_id';
    protected $fillable = [
        'list_name',
        'list_id'
    ];

    protected $table = 'to_do_lists';

    public function user(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'task_id');
    }
}
