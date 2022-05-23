<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Todolist;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Address;
use App\Models\Account;
use App\Models\Planner;
use App\Models\OwnedTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'password' => Hash::make($request->adminpassword),
        ]);
        $newadmin->user_type = $request->adminusertype;
        $newadmin->save();

        $last=User::latest()->first();
        $useradded = User::find($last->id);

        $id=$useradded->id;
        
        $useradded->user_detail_id = $useradded->id;
        $useradded->account_id = $useradded->id;
        $useradded->save();

        $details = new UserDetails;
        $details->address_id = $id;
        $details->fname = $request->adminfname;
        $details->lname = $request->adminlname;
        $details->contact_num = $request->admincontact;
        $details->birthdate = $request->adminbirthdate;
        $details->gender = $request->admingender;
        $details->save();

        $address = new Address;
        $address->street = $request->adminstreet;
        $address->barangay = $request->adminbarangay;
        $address->town = $request->admincity;
        $address->province = $request->adminprovince;
        $address->postal_code = $request->adminpostal;
        $address->save();

        $account = new Account;
        $account->theme_id=1;
        $account->level_id=1;
        $account->save();

        $list = new ToDoList;
        $list->task_id = $id;
        $list->student_id = $id;
        $list->list_name = "To Do List: ";
        $list->save();

        $ownedtheme = new OwnedTheme;
        $ownedtheme->theme_id = 1;
        $ownedtheme->student_id = $id;
        $ownedtheme->status = 'equipped';
        $ownedtheme->save();

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

        return $this->viewThemes();
    }
    public function editTheme($id, Request $request){
        $theme = Theme::find($id);

        $theme->theme_name = $request->themename;
        $theme->cost = $request->themecost;
        $theme->save();

        return $this->viewThemes();
    }

    public function deleteTheme($id){
        $theme = Theme::find($id);
        $theme->delete();

        return $this->viewThemes();
    }

    public function searchThemes(Request $request){
        $search = $request->searchthemes;
        $themes = Theme::where('theme_name', $search)->orWhere('theme_name', 'like', '%'.$search.'%')->paginate(10);

        return view('adminThemes', ['themes' => $themes]);
    }
}
