<div class="btn-group">
    @if((int) $course->status === \App\Course::PUBLISHED)
        <a class="btn btn-course" href="{{ route('courses.detail', ["slug" => $course->slug]) }}">
            <i class="fa fa-eye"></i> {{ __("Detalle") }}
        </a>
        <a class="btn btn-warning text-white" href="{{ route('courses.edit', ["slug" => $course->slug]) }}">
            <i class="fa fa-pencil"></i> {{ __("Editar curso") }}
        </a>

    @elseif((int) $course->status === \App\Course::PENDING)
        <a class="btn btn-primary text-white" href="#">
            <i class="fa fa-history"></i> {{ __("Curso pendiente de revisión") }}
        </a>
        <a class="btn btn-course" href="{{ route('courses.detail', ["slug" => $course->slug]) }}">
            <i class="fa fa-eye"></i> {{ __("Detalle") }}
        </a>
        <a class="btn btn-warning text-white" href="{{ route('courses.edit', ["slug" => $course->slug]) }}">
            <i class="fa fa-pencil"></i> {{ __("Editar curso") }}
        </a>

    @else
        <a class="btn btn-danger text-white" href="#">
            <i class="fa fa-pause"></i> {{ __("Curso rechazado") }}
        </a>

    @endif
    </div> 
    <div class="btn-group">
    @include('partials.courses.btn_forms.delete')
    <a class="btn btn-success text-white" href="{{ route('module.index', ["course_id" => $course->id])}}">
            <i class="fa fa-plus"></i> {{ __("Módulos") }}
    </a>

    <a class="btn btn-info text-white" href="{{ route('ucourse.list', ["course_id" => $course->id])}}">
            <i class="fa fa-plus"></i> {{ __("Vista del curso") }}
    </a>

    
</div>



