<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Models\Todolist;
use App\Models\Account;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use Carbon\Carbon;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Todolist::where('student_id', Auth::user()->id)->get();
        $tasks = Task::all();
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks]);

    }
    public function weekly()
    {
        return view('todolist-weekly');
    }
    public function monthly()
    {
        return view('todolist-monthly');
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
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks]);
    }

    public function getPoints($string){
        if($string == "assignment")
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
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks]);
    }

    public function finishTask($id){
        $finTask = Task::find($id);

        $finTask->status = "done";
        $finTask->date_finished = Carbon::now();

        $finTask->save();
        $date = Carbon::parse($finTask->due_date . " " . $finTask->time, 'Asia/Singapore');
        $earnedPoints = ($finTask->task_points * ($date->diffInDays(Carbon::now())));

        $test = Auth::user()->account()->points_earned;
        $account = Account::where('account_id', Auth::user()->id);
        dd($account);
        Auth::user()->account()->experience = $earnedPoints;

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
        return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks]);
    }

    public function createList(Request $request){


    $id = Auth::user()->id;

    $list = new Todolist;
    $list->list_name = $request->list_name;
    $list->student_id = $id;
    $value= DB::table('to_do_lists')->get()->count();
    $list->task_id=$value+1;
    $list->list_id = $list->task_id;
    $list->save();

    $lists = Todolist::where('student_id', Auth::user()->id)->get();
    $tasks = Task::all();
    return view('todolist', ['lists'=>$lists, 'tasks'=>$tasks]);
    }

    public function editList(Request $request, $id){
        $list = ToDoList::find($id);

        $list->task_id = $request->task_id;
        $list->list_id = $request->task_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showList($id)
    {
        $list = Todolist::where('student_id', $id)->get();

        return view('todolist', compact ('list'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
