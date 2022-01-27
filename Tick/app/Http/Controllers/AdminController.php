<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewUsers(Request $request){

        if($request->user_type == '0' || $request->user_type == null){
            $users = User::paginate(10);
        }else if($request->user_type == '1'){
            $users = User::where('user_type', 'Admin')->paginate(10);
        }else{
            $users = User::where('user_type', 'Student')->paginate(10);
        }

        return view('adminUsers', ['users' => $users, 'user_type' => $request->user_type]);
    }

    public function createAdmin(Request $request){
        $newadmin = User::create([
            'name' => $request->adminname,
            'email' => $request->adminemail,
            'password' => $request->adminpassword,
        ]);

        $newadmin->user_type = 'Admin';
        $newadmin->save();

        return redirect('admin-users');
    }

    public function searchUsers(Request $request){
        $search = $request->searchusers;
        $users = User::where('name', $search)->orWhere('name', 'like', '%'.$search.'%')->paginate(10);

        return view('adminUsers', ['users' => $users]);
    }

    public function editUser($id, Request $request){
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('admin-users');
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin-users');
    }

    public function viewTodolists(){

        $todolists = Todolist::paginate(10);
        return view('adminTodolists', ['todolists' => $todolists]);
    }

    public function searchLists(Request $request){
        $search = $request->searchlists;
        $todolists = Todolist::where('list_name', $search)->orWhere('list_name', 'like', '%'.$search.'%')->paginate(10);
        return view('adminTodolists', ['todolists' => $todolists]);
    }

    public function deleteList($id){
        $list = Todolist::find($id);
        $list->delete();

        return redirect('admin-todolists');
    }
    public function viewPlanners(){
        return view('adminPlanners');
    }

    public function viewThemes(){
        $themes = Theme::paginate(10);

        return view('adminThemes', ['themes'=>$themes]);
    }

    public function createTheme(Request $request){
        $theme = new Theme;

        $theme->theme_name = $request->themename;
        $theme->cost = $request->themecost;
        $theme->save();

        return redirect('adminThemes');
    }
    public function editTheme($id, Request $request){
        $theme = Theme::find($id);

        $theme->theme_name = $request->themename;
        $theme->cost = $request->themecost;
        $theme->save();

        return redirect('adminThemes');
    }

    public function deleteTheme($id){
        $theme = Theme::find($id);
        $theme->delete();

        return redirect('adminThemes');
    }

    public function searchThemes(Request $request){
        $search = $request->searchthemes;
        $themes = Theme::where('theme_name', $search)->orWhere('theme_name', 'like', '%'.$search.'%')->paginate(10);

        return view('adminThemes', ['themes' => $themes]);
    }
}
