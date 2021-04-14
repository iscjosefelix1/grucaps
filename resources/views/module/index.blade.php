@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Módulos', 'icon' => 'columns'])
@endsection

@section('content')


<div class="pl-5 pr-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.courses')}}"><i class="fa fa-list"></i> Curso</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-columns"></i> Modulos</a></li>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="btn btn-info btn-sm text-white" href="{{route('teacher.courses')}}"><i class="fa fa-reply"></i> {{ __("Atrás") }}</a>
      </li>
    </ul>
  </ol>
</nav>

<div class="row justify-content-center">
  <div class="col-md-12">
    <h1>Módulos</h1>
  </div>
</div>




<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">Número</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Materiales</th>
        <th class="text-center" width="250px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="fa fa-plus"></i> NUEVO
          </a>
{{-- 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show">
  Launch demo modal
</button> --}}
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($module as $value)
        <tr class="module{{$value->id}}">
          <td>{{ $no++ }}</td>
          {{-- <td>{{ $value->id }}</td> --}}
          <td>{{ $value->name }}</td>
          <td>{{ $value->descripcion }}</td>
          <td><a class="btn btn-success text-white" href="{{ route('video.index', ["module_id" => $value->id, "course_id" => $course_id])}}">
          {{-- <td><a class="btn btn-success text-white" href="{{ route('module.index', ["course_id" => $course->id])}}"> --}}
            <i class="fa fa-plus"></i> {{ __("Recursos") }}
            </a>
          </td>
          {{-- <td>{{ $value->course_id }}</td> --}}
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-descripcion="{{$value->descripcion}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-descripcion="{{$value->descripcion}}">
              <i class="fa fa-edit"></i>
            </a>
            {{-- <a href="#" class="edit-modal btn btn-warning btn-sm disabled" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a> --}}
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" data-descripcion="{{$value->descripcion}}">
              <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$module->links()}}
</div>

<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0480be">
          <h5 class="modal-title" style="color: white"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
                    <div class="modal-body">
                    <div class="form-group" style="display: none">
                      <label for="">ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre:</label>
                      <b id="ti"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripción :</label>
                      <b id="by"/>
                    </div>
                    </div>
                    </div>
                  </div>
                  </div>


{{-- Modal Form Create module --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007E33">
        <h5 class="modal-title" style="color: white"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">

            <div class="form-group">
            {{-- <label class="control-label col-sm-2" for="descripcion">ID:</label> --}}
            <div class="col-sm-10" style="display: none">
              <input type="text" class="form-control" id="course_id" name="course_id" value="{{ $course_id }}" 
              required>
              {{-- <p class="error text-center alert alert-danger hidden"></p> --}}
            </div>

            <label class="control-label col-sm-2" for="title">Nombre:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Escriba aquí" required>
              {{-- <p class="error text-center alert alert-danger hidden"></p> --}}
              <p class="hidden error text-center alert-danger"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="descripcion">Descripción:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="descripcion" name="descripcion"
              placeholder="Escriba aquí" required>
              <p class="hidden error text-center alert-danger"></p>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button type="button" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" type="submit" id="add" class="btn btn-primary">Guardar</button>
          </div>
    </div>
  </div>
</div></div>

{{-- Modal Form Edit and Delete module --}}
<div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00695c">
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
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Se eliminará el Módulo: <span class="name"></span>
          <span class="hidden id modid" style="display: none"></span>
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
@endsection
