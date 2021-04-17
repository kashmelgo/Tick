<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $primaryKey = 'plans_id';
    public function planner()
    {
        return $this->belongsTo('App\Models\Planner', 'plan_id', 'plan_id');
    }
}
