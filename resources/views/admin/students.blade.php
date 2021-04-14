@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Administrar estudiantes', 'icon' => 'unlock-alt'])
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
    <form action="{{ route('students.excel') }}">
        <button type="submit" class="btn btn btn-success" value="Lista Estudiantes">
            <span class="fa fa-file-excel-o"></span> Formato Lista de estudiantes
        </button> 
    </form>
</div>

<div class="row">
    <div class="table-striped" style="width:92%; text-align: center; " >
        <table class="table table-bordered" id="table" style="margin-left:60px;margin-right=60px;">
            <tr> 
                <th width="30px">No.</th>
                <th width="100px">Estudiante Asignado</th>
                <th width="100px">Curso Asignado</th>                            
            </tr>
            {{ csrf_field() }}
            <?php $no=1; ?>

            @foreach($students as $key => $value)
            <tr class="students{{$value->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ $value->User->name }}</td>
                <td>{{ $value->title }}</td>                
            </tr>
            @endforeach
        </table>   
        <div class="row justify-content-center">
            {{ $students->links() }}
        </div>    
    </div>    
</div>
@endsection
