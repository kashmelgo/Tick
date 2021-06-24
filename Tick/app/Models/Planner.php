<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    use HasFactory;

    protected $primaryKey = 'planner_id';
    public function plan()
    {
        return $this->hasMany('App\Models\Plan', 'plan_id', 'plan_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
