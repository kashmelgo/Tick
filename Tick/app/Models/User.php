<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account()
    {
        return $this->hasOne('App\Models\Account', 'account_id', 'account_id');
    }

    public function userDetail()
    {
        return $this->hasOne('App\Models\UserDetails', 'user_detail_id', 'user_detail_id');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task', "tasks_id", "tasks_id");
    }

    public function list(){
        return $this->hasMany('App\Models\Todolist', "list_id", "list_id");
    }
}
