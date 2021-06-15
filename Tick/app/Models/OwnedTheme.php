<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedTheme extends Model
{
    use HasFactory;
    protected $primaryKey = 'owned_theme_id';
    public function plan()
    {
        return $this->hasMany('App\Models\Theme', 'theme_id', 'theme_id');
    }
}
