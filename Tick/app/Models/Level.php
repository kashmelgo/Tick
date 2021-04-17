<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $primaryKey = 'level_id';
    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'level_id', 'level_id');
    }
}
