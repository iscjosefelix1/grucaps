@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Curso', 'icon' => 'columns'])
@endsection

@section('content')


<div class="pl-5 pr-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.courses')}}"><i class="fa fa-list"></i> Curso</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-columns"></i> Contenido</a></li>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="btn btn-info btn-sm text-white" href="{{route('teacher.courses')}}"><i class="fa fa-reply"></i> {{ __("Atrás") }}</a>
      </li>
    </ul>
  </ol>
</nav>

<div class="row justify-content-center">
  <div class="col-md-12">
    <h1>Contenido</h1>
  </div>
</div>




<div class="row">

</div>



    <div class="card card-body">

        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card border-light">
                <div class="card-header bg-primary text-white"><i class="fa fa-plus"></i> Agregar nuevo video:</div>
                <div class="card-body">
                  <label class="control-label" for="title"><i class="fa fa-align-justify"></i> Nombre:</label>




 {{--                  <audio id="audio" preload="auto" tabindex="0" controls="" >
  <source src="https://s3-us-west-2.amazonaws.com/allmetalmixtapes/Saxon%20-%201984%20-%20Crusader/01%20-%20Crusader%20Prelude.mp3">
</audio> --}}

<ul id="playlist">
        <li class="active">
           <a id="list" href="http://localhost/Learning/storage/app/public/video/N4jyVIo2xgb9qX1kMFG8pmdy1QFnCQeccRXd9O8U.mp4">
             Saxon - Crusader Prelude
           </a>
        </li>
        <li>
            <a id="list" href="http://localhost/Learning/storage/app/public/video/gcnQJhVKQEGolzJssRbzibwpH0XxvGjFJtztzsMc.mp4">
                Saxon - Little Bit Of What You Fancy
            </a>
        </li>
        <li>
            <a id="list" href="http://localhost/Learning/storage/app/public/video/SY2wp4oBQ4G9SLM9MjbINDBIAPWLjtgI3m6IR6cd.mp4">
                Saxon - Sailing To America
            </a>
        </li>
    </ul>



                </div>
              </div>
              
            </div>

            
            <div class="col-sm-8">
              <div class="card border-light">
                <div class="card-header bg-success text-white"><i class="fa fa-play"></i></div>
                <div class="card-body">
              <video id="audio" preload="auto" style="width:100%;" controls>
  <source src="http://localhost/Learning/storage/app/public/video/N4jyVIo2xgb9qX1kMFG8pmdy1QFnCQeccRXd9O8U.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
              </div>
          </div>
        </div>
            </div>
          </div>
        </div>

        

        


        






@endsection
