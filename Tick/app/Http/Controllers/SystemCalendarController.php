<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Account;


class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Plan',
            'date_start' => 'start',
            'date_end' => 'end',
            'field'      => 'event',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'plan.edit',
        ],
        [
            'model'      => '\App\Models\Task',
            'date_start' => 'due_date',
            'date_end'   => '',
            'field'      => 'task',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'task.edit',
        ]

    ];

    public function index(){
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }

        $accounttheme = DB::table('accounts')->where('accounts.account_id','=',Auth::user()->id)->get();
        foreach ($accounttheme as $accounttheme) {
            $theme = $accounttheme->theme_id;
        }

        foreach ($this->sources as $source) {
            foreach ($source['model']::where('account_id', Auth::user()->id) as $model) { /*change to where() */
                $start = $model->getAttributes()[$source['date_start']];
                $end = $model->getAttributes()[$source['date_end']];
                if (!$start || !$end) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $start,
                    'end' => $end,
                    // 'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('planner', ['theme'=>$theme, 'sidebarlevel'=>$sidebarlevel,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel] );
    }

}
