<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Level;

class PlannerController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Plan',
            'date_start' => 'date_start',
            'date_end' => 'date_end',
            'field'      => 'plan_name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'planner.show',
            'model2' => '\App\Models\Task'
        ],

    ];

    public function index()
    {
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }

        $plans = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) { /*change to where() */
                $start = $model->getAttributes()[$source['date_start']];
                $end = $model->getAttributes()[$source['date_end']];
                if (!$start || !$end) {
                    continue;
                }

                $plans[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $start,
                    'end' => $end,
                    // 'url'   => route($source['route'], $model->id),
                ];
            }
        }

        $accounttheme = DB::table('accounts')->where('accounts.account_id','=',Auth::user()->id)->get();
        foreach ($accounttheme as $accounttheme) {
            $theme = $accounttheme->theme_id;
        }

        return view('planner', ['theme'=>$theme, 'sidebarlevel'=>$sidebarlevel,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel, 'plans'=>$plans] );
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
