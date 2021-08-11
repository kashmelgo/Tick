<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todolist;
use App\Models\Task;
use App\Models\Planner;
use App\Models\Plan;
use App\Models\Theme;
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
        

        if(Auth::user()->user_type == "Student"){
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
            return view('home', ['theme'=>$theme,'lists'=>$lists, 'tasks'=>$tasks, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel] );
        }
        else {
            $users = User::all()->count();
            $user_admin = User::where('user_type', 'Admin')->count();
            $user_student = User::where('user_type', 'Student')->count();
            $todolists = ToDolist::all()->count();
            $tasks = Task::all()->count();
            $planners = Planner::all()->count();
            $plans = Plan::all()->count();
            $themes = Theme::all()->count();
            return view('adminHome',['users'=>$users,'user_admin'=>$user_admin,'user_student'=>$user_student,'todolists'=>$todolists,'tasks'=>$tasks,'planners'=>$planners,'plans'=>$plans,'themes'=>$themes]);
        }
        
        
    }
}
