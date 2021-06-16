<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $allthemes = Theme::all();
        $mythemes = OwnedTheme::where('student_id', Auth::user()->id)->get();
        foreach ($sidebaraccount as $sidebaraccount) {
            $sidebarlevel = Level::where('level_id', $sidebaraccount->level_id+1)->get();
            $sidebarexperience = $sidebaraccount->experience;
        }
        $account = Account::where('account_id', Auth::user()->id)->get();
        return view('themes', ['mythemes'=>$mythemes,'account'=>$account, 'sidebarexperience'=>$sidebarexperience, 'sidebarlevel'=>$sidebarlevel, 'allthemes'=>$allthemes]);
    }

    public function buytheme(Request $request){  
        $ownedtheme = new OwnedTheme;
        $ownedtheme->theme_id = $request->theme_id;
        $ownedtheme->student_id = Auth::user()->id;
        $ownedtheme->status = 'notequipped';
        $ownedtheme->save();
        return $this->index();;
    }

    public function equiptheme(){   
        return "equiptheme";
    }
}
