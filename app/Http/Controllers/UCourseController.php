<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidarVideoRequest;
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
use File;

class UCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(request $request)
    {



        $course_id = $request->route('course_id');
        $module = Modules::whereCourse_id($course_id)->paginate(10);    

        $video = DB::table('video')
            ->join('modules', 'video.module_id', '=', 'modules.id')
            ->join('courses', 'courses.id', '=', 'modules.course_id')
            ->where('courses.id', $course_id)
            ->select('video.*')
            ->get();

        //return view('module.index',compact('module', 'course_id'));
        //$module_id = $request->route('module_id');
        //$course_id = $request->route('course_id');
        //$video = Video::whereModule_id($module_id)->paginate(10);
        return view('ucourse.list',compact('module', 'course_id', 'video'));
    }


    private $nombreCarpetaFotos = "video";

    public function agregarFotos(Request $request, ValidarVideoRequest $peticion)
    {   


        foreach ($peticion->file("video") as $video) {
            //$fotoDeArticulo = new FotoDeArticulo;
            $rutaLarga = $video->store($this->nombreCarpetaFotos);


            # Crear un modelo...
        $v = new Video;

        # Establecer propiedades leídas del formulario
        $v->nombre = $request->nombre;
        $v->descripcion = $request->descripcion;
        $v->url = $rutaLarga;
        $v->module_id = $request->module_id;
        // $v->module_id = 1;
       
        # Y guardar modelo ;)
        $v->save();
        /*
        Ahora redirige a la ruta con el nombre
        inicio (mira routes/web.php) y pásale
        un mensaje en la variable "mensaje" con
        el valor de "Canción agregada"
         */
        
        }
        return back()
            ->with("mensaje", "Video(s) agregada(s) con éxito")
            ->with("tipo", "success");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editVideo(request $request){
        $video = Video::find ($request->id);
        $video->nombre = $request->nombre;
        $video->descripcion = $request->descripcion;
        $video->save();
        return response()->json($video);
        //return back();
        }

    public function deleteVideo(request $request){
        $video = Video::find ($request->id)->delete();

        //$filename = public_path().'/uploads_folder/'.$file;
        //\File::delete($filename);
        //$image_path = app_path($request->url);
        // $path = storage_path($request->url);
        // if(File::exists($path)){
          \Storage::delete($request->url);
      // }

    // if(file_exists($image_path)){

    //     \Storage::delete($request->url);
    //     //File::delete( $image_path);
    // }

        //\Storage::delete($request->url);

        return response()->json();
        }

    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    // // public function edit($id)
    // // {
    // //     //
    // // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
