<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\Task;


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
        return view('home', ['lists'=>$lists, 'tasks'=>$tasks]);
    }
}
