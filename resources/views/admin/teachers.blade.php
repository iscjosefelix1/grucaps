@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Administrar profesores', 'icon' => 'unlock-alt'])
@endsection

@section('content')
<style>
    
<style>
    .table-bordered>thead>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>tfoot>tr>td {
        text-align: center !important;
    }
</style>
</style>

<div style="margin:40px;">
    <form action="{{ route('teachers.excel') }}">
        <button type="submit" class="btn btn btn-success" value="Lista Maestros">
            <span class="fa fa-file-excel-o"></span> Formato Lista de Profesores
        </button> 
    </form>
</div>

<div class="row">
    <div class="table-striped" style="width:92%; text-align: center; " >
        <table class="table table-bordered" id="table" style="margin-left:60px;margin-right=60px;">
            <tr> 
                <th width="30px">No.</th>
                <th width="100px">Profesor Asignado</th>
                <th width="100px">Curso impartido</th>    
                <!--<th width="100px">Acciones</th>
                <th class="text-center" width="50px">
                    <a href="#" class="create-modal btn btn-sucess btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>-->            
            </tr>
            {{ csrf_field() }}
            <?php $no=1; ?>

            @foreach($teachers as $key => $value)
            <tr class="teachers{{$value->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ $value->User->slug }}</td>
                <td>{{ $value->title }}</td>
                <!--<td>
                    <a href="#" class="show-modal btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-id="{{ $value->id }}" data-title="{{ $value->title }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{ $value->id }}" data-title="{{ $value->title }}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>-->
            </tr>
            @endforeach
        </table>   
        <div class="row justify-content-center">
            {{ $teachers->links() }}
        </div>    
    </div>    
</div>

<script>
$(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#ti').text($(this).data('title'));
    $('#by').text($(this).data('body'));
    $('.modal-title').text('Show Post');
});
</script>

<!--INFORMACIÓN DE MODAL VISUALIZACIÓN-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="">No :</label>
            <b id="i"/> 
        </div>
        <div class="form-group">
            <label for="">Profesor Asignado :</label>
            <b id="ti"/>
        </div>
        <div class="form-group">
            <label for="">Curso Asignado :</label>
            <b id="by"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-earning" data-dismiss="modal">
            <span class="fa fa-times"></span> Close
        </button>
    </div>
    </div>
  </div>
</div>

@endsection

 