<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Town;

class StateController extends Controller
{
    public function index()
    {
        $states = State::pluck('name','id')->all();
        return view('index',compact('states'));
    }

    public function getStates()
    {
        $states = State::table('states')->pluck("name","id");
        return view('index',compact('states'));
    }

    public  function  getTowns(Request $request,$id)
    {
        if($request->ajax()){
            $towns = Town::towns($id);
            return response()->json($towns);
        }
    }
}
