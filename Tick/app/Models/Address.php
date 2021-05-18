<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = 'address_id';
    public function userDetail()
    {
        return $this->belongsTo('App\Models\UserDetails', 'address_id', 'address_id');
    }
}
