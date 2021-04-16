<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        /**$name = new CompleteName;
        $name->last_name = $request->lName;
        $name->mid_name = $request->mName;
        $name->first_name = $request->fName;
        $name->save();

        $add = new CompleteAdd;
        $add->province = $request->province;
        $add->municipality = $request->municipality;
        $add->barangay = $request->barangay;
        $add->street = $request->street;
        $add->house_num = $request->houseNo;
        $add->save();
        
        $contact = new ContactTable;
        $email = Auth::user();
        $contacts = $email->email;
        $contact->contact_num = $request->num;
        $contact->email = $contacts;
        $contact->save();

        $nameid = DB::table('complete_names')->where('last_name', $request->lName )->where('first_name', $request->fName )->value('name_id');
        $addid = DB::table('complete_adds')->where('house_num', $request->houseNo)->where('street', $request->street)->value('add_id');
        $contactid = DB::table('contact_tables')->where('contact_num', $request->num)->where('email', $contacts)->value('contact_id');

        $info = new InfoTable;
        $info->name_id = $nameid;
        $info->birthdate = $request->bday;
        $info->add_id = $addid;
        $info->gender = $request->gender;
        $info->contact_id = $contactid;
        $info->blood_type = $request->blood;
        $info->save();

        $infoid = DB::table('info_tables')->where('birthdate', $request->bday)->where('gender', $request->gender)->where('blood_type', $request->blood)->first()->info_id;
        $user = new UsersTable;
        $user->info_id = $infoid;
        $user->user_type = 'user';
        $user->user_photo = 'none';
        $user->save();
        */
        
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
