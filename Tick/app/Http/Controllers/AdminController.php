<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewUsers(){
        return view('adminUsers');
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
