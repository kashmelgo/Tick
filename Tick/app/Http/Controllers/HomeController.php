<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\Task;
use App\Models\Account;
use App\Models\Level;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $tasks = Task::all();
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        $accounttheme = DB::table('accounts')->where('accounts.account_id','=',Auth::user()->id)->get();
        foreach ($accounttheme as $accounttheme) {
            $theme = $accounttheme->theme_id;
        }

        if(Auth::user()->user_type == "Student"){
            return view('home', ['theme'=>$theme,'lists'=>$lists, 'tasks'=>$tasks, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel] );
        }
        else {
            return view('adminHome');
        }
        
        
    }
}
