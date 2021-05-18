<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Level;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function canLevelUp(Account $account){
        dd($account);
    }
}
