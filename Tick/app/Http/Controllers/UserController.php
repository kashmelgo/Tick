<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserDetails;
use App\Models\Address;
use App\Models\Account;
use App\Models\Planner;
use App\Models\ToDoList;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
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
        $id = Auth::user()->id;

        $details = new UserDetails;
        $details->address_id = $id;
        $details->fname = $request->fname;
        $details->lname = $request->lname;
        $details->image = $request->profile->store('images/profilepic', 'public');
        $details->contact_num = $request->contact;
        $details->birthdate = $request->birthdate;
        $details->gender = $request->gender;
        $details->educational_attainment = $request->attainment;
        $details->save();

        $address = new Address;
        $address->street = $request->street;
        $address->barangay = $request->barangay;
        $address->town = $request->town;
        $address->province = $request->province;
        $address->postal_code = $request->postal;
        $address->save();

        $account = new Account;
        $account->save();

        $planner = new Planner;
        $planner->plan_id = $id;
        $planner->student_id = $id;
        $planner->save();

        $rowCount = ToDoList::all()->count();
        $rowCount++;
        
        $list = new ToDoList;
        $list->task_id = $rowCount;
        $list->student_id = $id;
        $list->list_name = "To-Do List";
        $list->save();

        $timestamp = DB::table('user_details')->where('user_detail_id', $id)->value('created_at');
        DB::update('update users set user_detail_id = ?, account_id = ?, created_at = ?, updated_at = ? where id = ?', [$id,$id,$timestamp,$timestamp,$id]);

        return redirect('/home');
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
