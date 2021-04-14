<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function getStates(){
        $states = DB::table('states')->pluck("name","id");
        return view('dropdown', compact('states'));
    }
    public function getTowns($id) 
    {
        $towns = DB::table("towns")->where("state_id",$id)->pluck("name","id");
        return json_encode($towns);
    }
}
