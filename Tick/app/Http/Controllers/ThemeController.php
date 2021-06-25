<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\OwnedTheme;
use App\Models\Account;
use App\Models\Level;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $sidebaraccount = Account::where('account_id', Auth::user()->id)->get();

        $allthemes = json_decode((DB::table('themes')->select('themes.*')->get()), true);
        $ownedthemes = DB::table('owned_themes')->where('owned_themes.student_id','=',Auth::user()->id)->get();

        $themes = array(
            array('theme_id' => $allthemes[0]['theme_id'],'theme_name' => $allthemes[0]['theme_name'],'theme_cost' => $allthemes[0]['cost'],'theme_status' => null),
            array('theme_id' => $allthemes[1]['theme_id'],'theme_name' => $allthemes[1]['theme_name'],'theme_cost' => $allthemes[1]['cost'],'theme_status' => null),
            array('theme_id' => $allthemes[2]['theme_id'],'theme_name' => $allthemes[2]['theme_name'],'theme_cost' => $allthemes[2]['cost'],'theme_status' => null),
            array('theme_id' => $allthemes[3]['theme_id'],'theme_name' => $allthemes[3]['theme_name'],'theme_cost' => $allthemes[3]['cost'],'theme_status' => null)
        );



        foreach ($ownedthemes as $mytheme) {
            $themes[$mytheme->theme_id - 1]['theme_status'] = $mytheme->status;
        }

        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        $account = Account::where('account_id', Auth::user()->id)->get();
        foreach ($account as $account) {
            $points = $account->points_earned;
        }
        return view('themes', ['points'=>$points,'themes'=>$themes,'account'=>$account, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel]);
    }

    public function buytheme(Request $request){
        $points_earned = json_decode((Account::where('account_id', Auth::user()->id)->select('points_earned')->get()), true);
        $points = $points_earned[0]['points_earned'];
        $newpoints = $points - $request->theme_cost;

        DB::table('accounts')->where('account_id', Auth::user()->id)->update(['points_earned' => $newpoints]);

        $ownedtheme = new OwnedTheme;
        $ownedtheme->theme_id = $request->theme_id;
        $ownedtheme->student_id = Auth::user()->id;
        $ownedtheme->status = 'notequipped';
        $ownedtheme->save();

        return $this->index();;
    }

    public function equiptheme(Request $request){
        DB::table('accounts')->where('account_id', Auth::user()->id)->update(['theme_id' => $request->theme_id]);
        DB::table('owned_themes')->where('student_id', Auth::user()->id)->where('status', 'equipped')->update(['status' => 'notequipped']);
        DB::table('owned_themes')->where('student_id', Auth::user()->id)->where('theme_id', $request->theme_id)->update(['status' => 'equipped']);
        return $this->index();
    }
}
