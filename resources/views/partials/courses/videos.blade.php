<div class="col-12 pt-0 mt-0">
    <h2 class="text-muted">{{ __("Contenido del curso") }}</h2>
    <hr />
</div>




  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <video controls width="100%" id="myVideo" controls controlsList="nodownload">
            <source src="" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>



<div id="accordion">

  @forelse($module as $module)
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#{{ $module->id }}" aria-expanded="false" aria-controls="{{ $module->id }}">
          {{ $module->name }}
        </button>
      </h5>
    </div>
    <div id="{{ $module->id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
                
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Vistra previa</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($video as $videos)
                    @if($videos->module_id == $module->id)
                    <tr>
                        <td>{{ $videos->nombre }}</td>

                        @if($videos->public == "1")
                        <td><button class="btn btn-success vid" data-video="../storage/{{ $videos->url }}" data-toggle="modal" data-target="#videoModal">Ver Video</button></td>
                        
                        @else
                        <td><a href="https://gru-caps.com/public/subscriptions/plans"><button  type="button" class="btn btn-primary"> + Ver más</button></a></td>
                    </tr>
                        @endif
                    @endif
                @endforeach
              
            
          </tbody>
        </table>


      </div>
    </div>
  </div>
  @empty
    <div class="alert alert-dark">
        <i class="fa fa-info-circle"></i>
        {{ __("¿No hay vídeos? Inscríbete para ver el contenido") }}
    </div>    
@endforelse
</div>