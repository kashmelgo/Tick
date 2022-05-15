<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Models\Level;
use App\Models\Todolist;
use App\Models\Account;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use App\Traits\LevelUp;
use Carbon\Carbon;

class ToDoListController extends Controller
{

    use LevelUp;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(){
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
        return view('todolist', ['theme'=>$theme,'lists'=>$lists, 'tasks'=>$tasks,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function showaddList(){
        return view ('todolist-add');
    }

    public function showaddTask($id){
        $task_id = $id;
        return view ('todolist-add-task', compact('task_id'));
    }

    public function createTask(Request $request){
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $task = new Task;
        $task->task_id = $request->task_id;
        $task->task = $request->task;
        $task->due_date = $request->due_date;
        $task->time = $request->time;
        $task->task_type = $request->task_type;
        $task->subject = $request->subject;
        $task->date_finished = null;
        $task->task_points = $this->getPoints($task->task_type);
        $task->save();
        $tasks = Task::all();
        return redirect('/todolist');
    }

    public function newTask(Request $request){
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $task = new Task;
        $task->task_id = $request->task_id;
        $task->task = $request->task;
        $task->due_date = $request->due_date;
        $task->time = $request->time;
        $task->task_type = $request->task_type;
        $task->subject = $request->subject;
        $task->date_finished = null;
        $task->task_points = $this->getPoints($task->task_type);
        $task->save();
        $tasks = Task::all();
        return $this->showListContent($request->task_id);
    }

    public function createTaskInsideList(Request $request){
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $task = new Task;
        $task->task_id = $request->task_id;
        $task->task = $request->task;
        $task->due_date = $request->due_date;
        $task->time = $request->time;
        $task->task_type = $request->task_type;
        $task->subject = $request->subject;
        $task->date_finished = null;
        $task->task_points = $this->getPoints($task->task_type);
        $task->save();
        $tasks = Task::all();
        return $this->showListContent($request->task_id);
    }

    public function getPoints($string){
        if($string == "Assignment")
            return 15;
        else
            return 20;
    }

    public function seeTask(Request $request){
        $editTask = Task::find($request->tasks_id);
    }

    public function deleteTask(Request $request){
        $task = Task::where('tasks_id', $request->tasks_id);
        $task->delete();
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $tasks = Task::all();
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function finishTask($id){
        $finTask = Task::find($id);
        $date = Carbon::parse($finTask->due_date . " " . $finTask->time, 'Asia/Singapore');
        $finTask->status = "done";
        $finTask->date_finished = Carbon::now();
        $finTask->save();
        if(Carbon::now()->floatdiffInHours($date, false) <= 0){
            $earnedPoints = $finTask->task_points;
        }else{
            $earnedPoints = ($finTask->task_points * ((Carbon::now()->floatdiffInHours($date, false))/24));
        }
        $account = Auth::user()->account;
        $account->points_earned = $account->points_earned + $earnedPoints;
        $account->save();

        $account = Auth::user()->account;
        $account->experience = $account->experience + $earnedPoints;
        $account->save();
        // check if user will be able to level up code here
        $levelup = $this->canLevelUp($account->account_id);
        return $this->index();
    }

    public function editTask(Request $request){
        $task = Task::find($request->tasks_id);
        $task->task = $request->task;
        $task->subject = $request->subject;
        $task->due_date = $request->due_date;
        $task->time = $request->time;
        $task->task_type = $request->task_type;
        $task->save();
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $tasks = Task::all();
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function createList(Request $request){
        $id = Auth::user()->id;
        $list = new Todolist;
        $list->list_name = $request->list_name;
        $list->student_id = $id;
        $value= DB::table('to_do_lists')->latest('list_id')->first();
        $list->task_id=$value->list_id+1;
        $list->list_id = $list->task_id;
        $list->save();
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
        return view('todolist', ['theme'=>$theme,'lists'=>$lists, 'tasks'=>$tasks, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function createListHome(Request $request){
        $id = Auth::user()->id;
        $list = new Todolist;
        $list->list_name = $request->list_name;
        $list->student_id = $id;
        $value= DB::table('to_do_lists')->latest('list_id')->first();
        $list->task_id=$value->list_id+1;
        $list->list_id = $list->task_id;
        $list->save();
        return redirect('/home');
        }

    public function editList(Request $request){
        $list = ToDoList::find();
        $list->list_name = $request->list_name;
        return $this->index;
    }

    public function deleteList(Request $request){
        Task::where('task_id',$request->task_id)->delete();
        ToDolist::where('list_id',$request->task_id)->delete();
        return $this->index();
    }

    public function renameList(Request $request){
        $newname = Todolist::find($request->task_id);
        $newname->list_name = $request->new_name;
        $newname->save();
        return $this->index();
    }


    public function showList($id){
        $list = Todolist::where('student_id', $id)->get();
        return view('todolist', compact ('list'));
    }

    public function markAsDone($id){
        $finTask = Task::find($id);
        $date = Carbon::parse($finTask->due_date . " " . $finTask->time, 'Asia/Singapore');
        $finTask->status = "done";
        $finTask->date_finished = Carbon::now();
        $finTask->save();
        $earnedPoints = ($finTask->task_points * ((Carbon::now()->floatdiffInHours($date, false))/24));
        $account = Auth::user()->account;
        $account->points_earned = $account->points_earned + $earnedPoints;
        $account->save();
        $account = Auth::user()->account;
        $account->experience = $account->experience + $earnedPoints;
        $account->save();
        // check if user will be able to level up code here
        $levelup = $this->canLevelUp($account->account_id);
        return $this->showListContent($finTask->task_id);
    }

    public function showListContent($id){
        $list = Todolist::where('list_id', $id)->get();
        $tasks = Task::where('task_id', $id)->get();
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        $accounttheme = DB::table('accounts')->where('accounts.account_id','=',Auth::user()->id)->get();
        foreach ($accounttheme as $accounttheme) {
            $theme = $accounttheme->theme_id;
        }
        return view('todolist-tasks', ['theme'=>$theme,'list'=>$list,'tasks'=>$tasks,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function updateTask(Request $request){
        $update = Task::find($request->task_id);
        $update->task = $request->task;
        $update->due_date = $request->due_date;
        $update->time = $request->time;
        $update->task_type = $request->task_type;
        $update->subject = $request->subject;
        if($request->task_type == "Project"){
            $update->task_points = 20;
        }
        else {
            $update->task_points = 15;
        }
        $update->save();
        return $this->showListContent($request->task_id);
    }



}
