<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'points_earned',
        'experience',
    ];
    protected $primaryKey = 'account_id';
    public function theme()
    {
        return $this->hasOne('App\Models\Theme', 'theme_id', 'theme_id');
    }
    public function level()
    {
        return $this->hasOne('App\Models\Level', 'level_id', 'level_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'account_id', 'account_id');
    }
}
