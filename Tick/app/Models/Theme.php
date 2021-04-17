<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $primaryKey = 'theme_id';
    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'theme_id', 'theme_id');
    }
}
