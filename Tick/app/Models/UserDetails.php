<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_detail_id';
    public function address()
    {
        return $this->hasOne('App\Models\Address', 'address_id', 'address_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_detail_id', 'user_detail_id');
    }

}
