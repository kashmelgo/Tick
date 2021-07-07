<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Level;
use App\Models\Todolist;

class PlannerController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Task',
            'date_start' => 'due_date',
            'date_end'   => '',
            'field'      => 'task',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'todolist-tasks',
        ],
        [
            'model'      => '\App\Models\Plan',
            'date_start' => 'start',
            'date_end' => 'end',
            'field'      => 'event',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'plan.edit',

        ],


    ];

    public function index()
    {

        $lists = Todolist::where('student_id', Auth::user()->id)->get();

        // $id = Auth::user()->list()->list_id;


        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }

        $accounttheme = DB::table('accounts')->where('accounts.account_id','=',Auth::user()->id)->get();
        foreach ($accounttheme as $accounttheme) {
            $theme = $accounttheme->theme_id;
        }

        // foreach ($this->sources as $source) {
            foreach ($this->sources[0]['model']::where('tasks_id', $lists[0]->task_id)->get() as $model) { /*change to where() */

                $due_date = $model->getAttributes()['due_date'];
                if (!$due_date) {
                    continue;
                }

                $events[] = [
                    'title' => trim($this->sources[0]['prefix'] . ' ' . $model->{$this->sources[0]['field']} . ' ' . $this->sources[0]['suffix']),
                    'start' => $due_date,
                    // 'url'   => route($this->sources[0]['route'], $model->id),
                ];
            }
        // }

        return view('planner', ['theme'=>$theme, 'sidebarlevel'=>$sidebarlevel,'sidebarexperience'=>$sidebarexperience, 'events'=>$events] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
