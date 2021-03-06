<?php

namespace App\Http\Controllers;

use App\Course;
use App\Helpers\Helper;
use App\Http\Requests\CourseRequest;
use App\Mail\NewStudentInCourse;
use App\Review;
use Illuminate\Support\Facades\DB;
use App\Modules;

class CourseController extends Controller
{
    public function show (Course $course){
        $course->load([
            'category' => function ($q){
                $q->select('id', 'name');
            },
            'goals' => function ($q){
                $q->select('id', 'course_id', 'goal');
            },
            'level' => function ($q){
                $q->select('id', 'name');
            },
            'requirements' => function ($q) {
                $q->select('id', 'course_id', 'requirement');
            },
            'reviews.user',
            'teacher'
        ])->get();

        $related = $course->relatedCourses();

        $idvideo = $course->idCourse(); 

        $module = Modules::whereCourse_id($idvideo)->paginate(10);  

        $video = DB::table('video')
            ->join('modules', 'video.module_id', '=', 'modules.id')
            ->join('courses', 'courses.id', '=', 'modules.course_id')
            ->where('courses.id', $idvideo)
            ->select('video.*')
            ->get();       
        
        return view('courses.detail', compact('course', 'related', 'module', 'video'));
    }

    public function inscribe (Course $course) {
        $course->students()->attach(auth()->user()->student->id);

        \Mail::to($course->teacher->user)->send(new NewStudentInCourse($course,auth()->user()->name));

        return back()->with('message',['success',__('Inscrito correctamente en el curso')]);

    }
    public function subscribed () {
        $courses = Course::whereHas('students', function($query) {
            $query->where('user_id', auth()->id());
        })->get();
        return view('courses.subscribed', compact('courses'));
    }
    public function addReview () {
        Review::create([
            "user_id" => auth()->id(),
            "course_id" => request('course_id'),
            "rating" => (int) request('rating_input'),
            "comment" => request('message')
        ]);
        return back()->with('message', ['success', __('Muchas gracias por valorar el curso')]);
    }
    public function create(){
        $course = new Course;
        $btnText = __("Enviar curso para revisi??n");
        return view('courses.form', compact('course', 'btnText'));
    }

    /**
     * @param CourseRequest $course_request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (CourseRequest $course_request) {

        $picture = Helper::uploadFile('picture', 'courses');
        $course_request->merge(['picture' => $picture]);
        $course_request->merge(['teacher_id' => auth()->user()->teacher->id]);
        $course_request->merge(['status' => Course::PENDING]);
        Course::create($course_request->input());
        return back()->with('message', ['success', __('Curso enviado correctamente, recibir?? un correo con cualquier informaci??n')]);
    }

    public function edit ($slug) {
        $course = Course::with(['requirements', 'goals'])->withCount(['requirements', 'goals'])
            ->whereSlug($slug)->first();
        $btnText = __("Actualizar curso");
        return view('courses.form', compact('course', 'btnText'));
    }

    public function list ($slug) {
        $course = Course::with(['requirements', 'goals'])->withCount(['requirements', 'goals'])
            ->whereSlug($slug)->first();
        $btnText = __("Guardar informaci??n");
        return view('courses.list', compact('course', 'btnText'));
    }

    public function add ($slug) {
        $course = Course::with(['requirements', 'goals'])->withCount(['requirements', 'goals'])
            ->whereSlug($slug)->first();
        $btnText = __("Guardar informaci??n");
        return view('courses.add', compact('course', 'btnText'));
    }

    public function update (CourseRequest $course_request, Course $course) {
        if($course_request->hasFile('picture')) {
            \Storage::delete('courses/' . $course->picture);
            $picture = Helper::uploadFile( "picture", 'courses');
            $course_request->merge(['picture' => $picture]);
        }
        $course->fill($course_request->input())->save();
        return back()->with('message', ['success', __('Curso actualizado')]);
    }

    public function destroy (Course $course) {
        try {
            $course->delete();
            return back()->with('message', ['success', __("Curso eliminado correctamente")]);
        } catch (\Exception $exception) {
            return back()->with('message', ['danger', __("Error eliminando el curso")]);
        }
    }
}
