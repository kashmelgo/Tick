<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Level;
use App\Models\Account;
use App\Models\ToDolist;
use App\Models\Task;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $profile = DB::table('users')
        ->join('user_details', 'users.user_detail_id', '=', 'user_details.user_detail_id')
        ->join('addresses', 'user_details.address_id', '=', 'addresses.address_id')
        ->join('accounts', 'users.account_id', '=', 'accounts.account_id')
        ->select('users.*', 'user_details.*', 'addresses.*','accounts.*')
        ->where('users.id', $id)
        ->get();

        $interface = DB::table('accounts')
        ->join('themes', 'accounts.theme_id', '=', 'themes.theme_id')
        ->join('levels', 'accounts.level_id', '=', 'levels.level_id')
        ->select('themes.*', 'levels.*')
        ->where('accounts.account_id', $id)
        ->get();

        $level = Level::find(Auth::user()->account->level_id);
        $account = Account::find(Auth::user()->account_id);
        $listnum = ToDolist::where('student_id', Auth::user()->id)->count();

        $taskCount = 0;
        $taskDone = 0;
        $taskNotDone = 0;
        $lists = ToDolist::where('student_id', Auth::user()->id)->get();
        foreach ($lists as $list) {
            $tasks = Task::where('task_id', $list->task_id)->get();
            foreach ($tasks as $task) {
                $taskCount++;
                if ($task->status == "done") {
                    $taskDone++;
                } else {
                    $taskNotDone++;
                }
                
            }
        }

        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        return view('profile',['taskCount'=>$taskCount,'taskDone'=>$taskDone,'taskNotDone'=>$taskNotDone,'listnum'=>$listnum,'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel])->with('profile',$profile)->with('interface',$interface)->with('level', $level)->with('account', $account);
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
    public function update(Request $request)
    {
        DB::table('user_details')->where('user_detail_id', Auth::user()->id)->update(['fname' => $request->fname,'lname' => $request->lname,
        'birthdate' => $request->birthdate,'gender' => $request->gender,'educational_attainment' => $request->attainment,'contact_num' => $request->contact]);
        DB::table('addresses')->where('address_id', Auth::user()->id)->update(['street' => $request->street,'barangay' => $request->barangay,
        'town' => $request->town,'province' => $request->province,'postal_code' => $request->postal ]);
        return redirect()->action([ProfileController::class, 'index']);
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
