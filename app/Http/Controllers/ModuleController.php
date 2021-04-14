<?php

namespace App\Http\Controllers;
use App\Modules;
use App\Video;
use Illuminate\Http\Request;
use Redirect;
// use Response;
use Illuminate\Support\Facades\DB;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class ModuleController extends Controller
{
  public function index(request $request){
    $course_id = $request->route('course_id');
    $module = Modules::whereCourse_id($course_id)->paginate(10);    
    return view('module.index',compact('module', 'course_id'));
  }

  public function addModule(Request $request){
    $rules = array(
      'course_id' => 'required',
      'name' => 'required',
      'descripcion' => 'required',
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $module = new Modules;
    $module->name = $request->name;
    $module->descripcion = $request->descripcion;
    $module->course_id = $request->course_id;
    $module->save();
    return response()->json($module);
  }
}

public function editModule(request $request){
$module = Modules::find ($request->id);
$module->name = $request->name;
$module->descripcion = $request->descripcion;
$module->save();
return response()->json($module);
}

public function deleteModule(request $request){

$videos = Video::where('module_id', $request->id)->get();

foreach ($videos as $video) {
    $url = $video->url;
    \Storage::delete($url);
    Video::find($video->id)->delete();
  }

// $module = Modules::find ($request->id)->delete();

// Video::delete([

//        //reg_id is id for registration table

//         'user_id' => $created_user->id,
//         'class_id' => $request->class_id,
//         'section_id' => $request->section_id,

//     ]);




$module = Modules::find ($request->id)->delete();
return response()->json();
}
}


// use Illuminate\Http\Request;

// class ModulesController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     *
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
     
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
