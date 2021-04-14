@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Videos', 'icon' => 'play-circle'])
@endsection

@section('content')

<div class="pl-5 pr-5">

{{-- <div class="row justify-content-center">
  <div class="col-md-12">
    <h1>Videos</h1>
  </div>
</div> --}}

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.courses')}}"><i class="fa fa-list"></i> Curso</a></li>
    <li class="breadcrumb-item"><a href="{{ route('module.index', ["course_id" => $course_id])}}"><i class="fa fa-columns"></i> Modulos</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-play-circle"></i> Video</li>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="btn btn-info btn-sm text-white" href="{{ route('module.index', ["course_id" => $course_id])}}"><i class="fa fa-reply"></i> {{ __("Atrás") }}</a>
      </li>
    </ul>
  </ol>
</nav>

  <div class="row">
    <div class="col">
      {{-- <a class="btn btn-info text-white" href="{{ route('module.index', ["course_id" => $course_id])}}">
            <i class="fa fa-reply"></i> {{ __("Atrás") }}</a> --}}
    </div>
    <div class="col">
      <p>
  <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <i class="fa fa-plus"></i> Agregar
  </a>
</p>
    </div>
  </div>
{{--   <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div> --}}




<div class="collapse" id="collapseExample">
    <div class="card card-body">

        <div class="container">
          <div class="row">
            <div class="col-sm">
              <div class="card border-light">
                <div class="card-header bg-primary text-white"><i class="fa fa-plus"></i> Agregar nuevo video:</div>
                <div class="card-body">
                 <form enctype="multipart/form-data" method="post" action="{{route("agregarFotosDeArticulo")}}">
                  @csrf

                  <div class="form-group">
                    <div class="col-sm-10">
                        <input hidden="" type="text" readonly="" class="form-control" id="module_id" name="module_id" value="{{ $module_id }}" required>
                    </div>

                    <label class="control-label" for="title"><i class="fa fa-align-justify"></i> Nombre:</label>
                    <div class="col">
                      <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                    </div>

                    <label class="control-label" for="title"><i class="fa fa-list"></i> Descripción:</label>
                    <div class="col">
                      <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                    </div>

                    
                    <label class="control-label" for="public"><i class="fa fa-bullseye"></i> Visible para el publico:</label>
                    <div class="col">
                        <select id="public" name="public" class="browser-default custom-select">
                          <option selected="selected" value="0">NO</option>
                          <option value="1">SÍ</option>
                        </select>
                    </div>
                            

                    <label class="control-label" for="title"><i class="fa fa-folder-open"></i> Archivo de video:</label>
                    <div class="col">
                      <input type="file" id="picture" name="video[]" class="custom-file-input" accept="video/*" required=""> 
                      <label for="picture" class="custom-file-label">Elegir video </label>
                    </div>
                  </div>
                  <div class="col text-center">
     <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
    </div>
                  
              </form>
                </div>
              </div>
              
            </div>
            
              @include("video.errores")
            
            <div class="col-sm">
              <div class="card border-light">
                <div class="card-header bg-success text-white"><i class="fa fa-play"></i></div>
                <div class="card-body">
              <video style="width:100%;" controls>
                  <source src="" id="video_here"> Your browser does not support HTML5 video.
              </video>
              </div>
          </div>
        </div>
            </div>
          </div>
        </div>

        

        


        



    </div>









<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">Número</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Visible al público</th>
        {{-- <th>Visualización</th> --}}
        <th>Acciones</th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($video as $value)
        <tr class="video{{$value->id}}">
          <td>{{ $no++ }}</td>
          <td>{{ $value->nombre }}</td>
          <td>{{ $value->descripcion }}</td>
          {{-- <td>{{ $value->public }}</td> --}}
          <td><video width="200" controls>
                  <source src="../../../../storage/app/public/{{ $value->url }}" id="video_here"> Your browser does not support HTML5 video.
              </video></td>
          <td>
            <a href="#" class="edit-modalv btn btn-warning btn-sm" data-id="{{$value->id}}" data-nombre="{{$value->nombre}}" data-descripcion="{{$value->descripcion}}" data-public="{{$value->public}}">
              <i class="fa fa-edit"></i>
            </a> 
            <a href="#" class="delete-modalv btn btn-danger btn-sm" data-id="{{$value->id}}" data-nombre="{{$value->nombre}}" data-url="{{$value->url}}">
              <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$video->links()}}
</div>

<div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header cab" style="">
        <h5 class="modal-title" style="color: white"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
        <form class="form-horizontal" role="modal">

          <div class="form-group" style="display: none">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Nombre:</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="n">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="body">Descripción:</label>
            <div class="col-sm-10">
            <textarea type="name" class="form-control" id="d"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-8" for="body">Visible al público:</label>
            <div class="col-sm-10">
              <select id="editpublic" name="editpublic" class="browser-default custom-select col-sm-4">
                          <option value="0">NO</option>
                          <option value="1">SÍ</option>
              </select>
            </div>
          </div>
        </form>


        

                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Se eliminará el video: <span class="name"></span>
          <span class="hidden id vidid" style="display: none"></span>
          <span class="hidden url vidurl" style="display: none"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Cerrar
        </button>

      </div>

    </div>
  </div>
</div>


<div id="modalconfirm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FE6464">
        <h5 class="modal-title" style="color: white">Eliminado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Se eliminó el video correctamente.
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-info" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Aceptar
        </button>

      </div>

    </div>
  </div>
</div>


<div id="modalconf" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FCC558">
        <h5 class="modal-title" style="color: white">Actualizado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

                {{-- Form Delete Post --}}
        <div class="">
          Se actualizó la información correctamente.
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-info reload" data-dismiss="modal">
          <span class="glyphicon "></span>Aceptar
        </button>

      </div>

    </div>
  </div>
</div>





@endsection



