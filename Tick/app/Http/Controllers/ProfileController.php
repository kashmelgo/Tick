<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        return view('profile')->with('profile',$profile)->with('interface',$interface);
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
