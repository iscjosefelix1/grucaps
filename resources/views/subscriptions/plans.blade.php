@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush

@section('jumbotron')
    @include('partials.jumbotron',[
        'title' => __("Suscribete ahora a uno de nuestros planes"),
        'icon' => 'globe'
    ])
@endsection

@section('content')
    <div class="container">
        <div class="pricing-table pricing-three-colum row">
            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-bronze">
                    <h2>{{ __("CURSO ONLINE EN VIVO") }}</h2>
                    <span>{{ __(":price / EnVivo", ['price' => '25 USD']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature">{{ __("Acceso a curso Online") }}</li>
                    <li class="plan-feature">{{ __("Acceso a video conferencia") }}</li>
                    <li class="plan-feature">{{ __("1 mes gratis de Acceso a Videos de la Página") }}</li>
                    <li class="plan-feature">
                        
                    </li>
                </ul>
            </div>
            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-silver">
                    <h2>{{ __("MENSUAL") }}</h2>
                    <span>{{ __(":price / 1 Mes", ['price' => '$ 59.99']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature">{{ __("Acceso a todos los cursos") }}</li>
                    <li class="plan-feature">{{ __("Acceso a video conferencias") }}</li>
                    <li class="plan-feature">{{ __("Contacto con Asesores") }}</li>                   
                </ul>                 
            </div>
            
            <div class="plan col-sm-4 col-lg-4">
                <div class="plan-name-gold">
                    <h2>{{ __("ANUAL") }}</h2>
                    <span>{{ __(":price / 12 Meses", ['price' => '$ 499.00']) }}</span>
                </div>
                <ul>
                    <li class="plan-feature">{{ __("Acceso a todos los cursos") }}</li>
                    <li class="plan-feature">{{ __("Acceso a video conferencias") }}</li>
                    <li class="plan-feature">{{ __("Contacto con Asesores") }}</li>
                    <li class="plan-feature">
                        
                    </li>
                </ul>
            </div>            
        </div>
    </div>
@endsection