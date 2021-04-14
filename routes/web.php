<?php

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name( 'set_language');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post(
    'stripe/webhook',
    'StripeWebHookController@handleWebhook'
);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/images/{path}/{attachment}', function($path, $attachment) {
    $file = sprintf('storage/%s/%s', $path, $attachment);
    if(File::exists($file)) {
        return Image::make($file)->response();
    }
});

Route::group(['prefix' => 'courses'], function(){
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/subscribed', 'CourseController@subscribed')->name('courses.subscribed');
        Route::get('/{course}/inscribe', 'CourseController@inscribe')->name('courses.inscribe');
        Route::post('/add_review', 'CourseController@addReview')->name('courses.add_review');

        Route::get('/create','CourseController@create')->name('courses.create')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);
        Route::post('/store','CourseController@store')->name('courses.store')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);
        Route::put('/{course}/update','CourseController@update')->name('courses.update')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);

        Route::get('/{slug}/edit', 'CourseController@edit')->name('courses.edit')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);
        Route::put('/{course}/update', 'CourseController@update')->name('courses.update')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);
        Route::delete('/{course}/destroy', 'CourseController@destroy')->name('courses.destroy')
            ->middleware([sprintf("role:%s",\App\Role::TEACHER)]);

        Route::get('/{course_id}/view', 'UCourseController@list')->name('courses.view');
    });

    Route::get('/{course}','CourseController@show')->name('courses.detail');
});

Route::group(['middleware' => ['auth']],function (){
    Route::group(['prefix' => "subscriptions"], function(){
        Route::get('/plans','SubscriptionController@plans')
            ->name('subscriptions.plans');
        Route::get('/admin','SubscriptionController@admin')
            ->name('subscriptions.admin');
        Route::post('/process_subscription','SubscriptionController@processSubscription')
            ->name('subscriptions.process_subscription');
        Route::post('/resume', 'SubscriptionController@resume')->name('subscriptions.resume');
        Route::post('/cancel', 'SubscriptionController@cancel')->name('subscriptions.cancel');
    });

    Route::group(['prefix' => "invoices"], function() {
        Route::get('/admin', 'InvoiceController@admin')->name('invoices.admin');
        Route::get('/{invoice}/download', 'InvoiceController@download')->name('invoices.download');
    });
});

Route::group(["prefix" => "profile", "middleware" => ["auth"]], function() {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::put('/', 'ProfileController@update')->name('profile.update');
});

Route::group(['prefix' => "solicitude"], function() {
    Route::post('/teacher', 'SolicitudeController@teacher')->name('solicitude.teacher');
});

Route::group(['prefix' => "teacher", "middleware" => ["auth"]], function() {
    Route::get('/courses', 'TeacherController@courses')->name('teacher.courses');
    Route::get('/students', 'TeacherController@students')->name('teacher.students');
    Route::post('/send_message_to_student', 'TeacherController@sendMessageToStudent')->name('teacher.send_message_to_student');
});

Route::group(['prefix' => "admin", "middleware" => ['auth', sprintf("role:%s", \App\Role::ADMIN)]], function() {
    Route::get('/courses', 'AdminController@courses')->name('admin.courses');
    Route::get('/courses_json', 'AdminController@coursesJson')->name('admin.courses_json');
    Route::post('/courses/updateStatus', 'AdminController@updateCourseStatus');
    
    Route::get('/teachers', 'AdminController@teachers')->name('admin.teachers');
    Route::get('/teachers-list-excel', 'AdminController@exportExcel')->name('teachers.excel');

    Route::get('/students', 'AdminController@students')->name('admin.students');
    Route::get('/students-list-excel', 'AdminController@exportExcel2')->name('students.excel');
});

Route::get('register','DataController@getStates')->name('register');
Route::get('register/gettowns/{id}','DataController@getTowns');

Route::group(['middleware' => ['web']], function() {
  Route::resource('module','ModuleController');
  Route::get('/{course_id}/module', 'ModuleController@index')->name('module.index');
  Route::post('/{course_id}/addModule', 'ModuleController@addModule')->name('module.add');
  //Route::POST('addModule','ModuleController@addModule');
  Route::post('/{course_id}/editModule','ModuleController@editModule')->name('module.edit');
  Route::post('/{course_id}/deleteModule','ModuleController@deleteModule')->name('module.delete');
});

Route::group(['middleware' => ['web']], function() {
  Route::resource('video','VideoController');
  Route::get('/{course_id}/module/{module_id}/video', 'VideoController@index')->name('video.index');
  Route::post('/{course_id}/module/{module_id}/editVideo', 'VideoController@editVideo')->name('video.edit');
  Route::post('/{course_id}/module/{module_id}/deleteVideo', 'VideoController@deleteVideo')->name('video.delete');
  Route::post("video/fotos","VideoController@agregarFotos")->name("agregarFotosDeArticulo");

});

Route::group(['middleware' => ['web']], function() {
  Route::resource('user','UCourseController');
  Route::get('user/{course_id}/curso', 'UCourseController@list')->name('ucourse.list');
});