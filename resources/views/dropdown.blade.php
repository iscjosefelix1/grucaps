@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <h3>Información básica</h3>
                        <hr>
                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Estado de la republica -->
                        <div class="form-group row">
                          <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                            <div class="col-md-6">
                                <select name="state" class="form-control">
                                    @foreach ($states as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>

                        <!-- Municipio -->
                        <div class="form-group row">
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>
                              <div class="col-md-6">
                                <select name="town" class="form-control">
                                </select>
                            </div>  
                        </div>
                        
                        <!-- Profesiones -->
                        <div class="form-group row">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>
                            <div class="col-md-6">
                                <select name="profession" class="form-control">
                                    <option>-- Selecciona Profesión --</option>
                                    <option value = "Ingeniero Civil">Ingeniero Civil</option>
                                    <option value = "Arquitecto">Arquitecto</option>
                                    <option values = "Estudiantes/Pasante"> Estudiante/Pasante</option>
                                </select>
                            </div>
                        </div>

                        <!--Edad del usuario-->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required autofocus>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Edad -->
                        <!--<div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                    <input type="text" class="input-medium bfh-phone" data-country="US">
                            </div>
                        </div>-->

                        <!-- Sexo -->
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>
                            <div class="col-md-6">
                                <label class="radio-inline" for="sex-0">
                                    <input name="sex" class="align-middle" id="sex-0" value="Masculino" checked="checked" type="radio">
                                        Male
                                </label> 
                                <label class="radio-inline" for="sex-1">
                                    <input name="sex" class="align-middle form-horizontal" id="sex-1" value="Femenino" type="radio">
                                        Female
                                </label>
                            </div>
                        </div>
                        <!-- Multiple Checkboxes -->
             
                        <div class="form-group::before row">
                            <label class="col-md-4 col-form-label text-md-right" for="interests">{{ __('interests') }} (Opcional)</label>
                                <div class="col-sm-12::after">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="interests" value="Libros">
                                            {{ __('Libros') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="interests" value="Cine">
                                            {{ __('Cine') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="interests" value="Viajar">
                                            {{ __('Viajar') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="interests" value="Dormir">
                                            {{ __('Dormir') }}       
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="interests" value="Musica">
                                            {{ __('Música') }}
                                        </label>
                                    </div>
                                </div>                      
                        </div>
                        <!-- número de telefonico -->
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                            <div class="col-md-6">
                                    <input type="number" id="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number">
                                    @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>


                        <!-- información de la cuenta -->
                        <hr>
                        <h3>Información de la cuenta</h3>
                        <hr>
                        <!-- Correo electronico  -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- check terminos y condiciones -->
                        <div class="form-group row">
                            <div class="form-check col-md-6 offset-md-4">
                              <input class="form-check-input" type="checkbox" id="gridCheck" required>
                              <label class="form-check-label" for="gridCheck">
                                Acepto lo terminos y condiciones presentes <a class="text-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">aquí</a>
                              </label>
                            </div>
                          </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">{{ __('The Politics of Privacy') }}</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    @include('avisoprivacidad')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('partials.auth.social_login')
    </div>
</div>
@endsection
@section('dropdown')
   
      <script>
        jQuery(document).ready(function ()
    {
            jQuery('select[name="state"]').on('change',function(){
               var stateID = jQuery(this).val();
               if(stateID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/gettowns/' +stateID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="town"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="town"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="town"]').empty();
               }
            });
    });
      </script>
      <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
      <script src="{{ asset('js/dropdown.js') }}"></script>
@endsection