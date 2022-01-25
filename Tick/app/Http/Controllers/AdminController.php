<?php

namespace App\Http\Controllers;

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

    public function searchUsers(Request $request){
        $search = $request->searchusers;
        $users = User::where('name', $search)->orWhere('name', 'like', '%'.$search.'%')->paginate(10);

        return view('adminUsers', ['users' => $users]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin-users');
    }
    public function viewTodolists(){
        return view('adminTodolists');
    }

    public function viewPlanners(){
        return view('adminPlanners');
    }

    public function viewThemes(){
        return view('adminThemes');
    }
}
