@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Contenido del Curso', 'icon' => 'bookmark'])
@endsection

@section('content')


<div class="pl-5 pr-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <!--li class="breadcrumb-item"><a href="{{route('teacher.courses')}}"><i class="fa fa-list"></i> Curso</a></li-->
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-bookmark"></i> Contenido del curso</a></li>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="btn btn-info btn-sm text-white" href="{{route('courses.subscribed')}}"><i class="fa fa-reply"></i> {{ __("Atrás") }}</a>
      </li>
    </ul>
  </ol>
</nav>


<div class="card card-body">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="card border-light">
          <div class="card-header bg-primary text-white"><i class="fa fa-plus"></i> Contenido:</div>
          <div class="card-body">

          <ul id="playlist">
            <?php  $no=1; ?>
            @foreach ($module as $value)
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ $value->id }}" aria-expanded="false" aria-controls="{{ $value->id }}"><i class="fa fa-align-justify"></i>
                    {{ $no++ }}
                  </button>
                </h2>
                <label class="control-label" for="title">{{ $value->name }}</label>
              </div>
              <div id="{{ $value->id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <label class="control-label" for="title"><i class="fa fa-bookmark"></i> {{ $value->descripcion }}</label>
                  <ul id="playlist">

                  @foreach ($video as $videos)
                    @if($videos->module_id == $value->id) 
                    <li>
                      <a id="list" href="../../../storage/app/public/{{ $videos->url }}"> <i class="fa fa-play"></i> {{ $videos->nombre }} - {{ $videos->descripcion }}</a>
                    </li>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
            @endforeach
          </ul>
          </div>
        </div>
      </div>

            
      <div class="col-sm-8">
        <div class="card border-light">
          <div class="card-header bg-success text-white"><i class="fa fa-play"></i></div>
          <div class="card-body">
            <video id="audio" preload="auto" style="width:100%;" controls controlsList="nodownload">
              <source src="" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
