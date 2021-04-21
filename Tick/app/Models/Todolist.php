<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_name',
        'list_id'
    ];

    protected $table = 'to_do_lists';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
