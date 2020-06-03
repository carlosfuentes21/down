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


                            <div class="form-group row">
                                <!-- /.Div para los nombres -->
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Nombres" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- /.fin de div para los nombres-->


                                <!-- /.Div para el apellido -->
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Apellidos" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- /.Row para documento y fecha_nacimiento -->
                            <div class="row form-group">
                                <div class="col">
                                    <input type="number" name="documento" class="form-control @error('documento') is-invalid @enderror"  name="documento" value="{{ old('documento') }}" required autocomplete="documento" 
                                            placeholder="Documento" required autocomplete="lastname" autofocus>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @error('documento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     

                                <div class="col ">
                                    <input type="date" name="fechaNac" class="form-control @error('fechaNac') is-invalid @enderror" autocomplete="off" value="{{ old('fechaNac') }}"
                                            placeholder="Fecha de Nacimiento">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @error('documento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                    
                            <!-- /.Row para sexo y telefono-->  
                            <div class="row form-group">
                                <div class="col ">
                                    <SELECT name="sexo" class="form-control @error('sexo') is-invalid @enderror" autocomplete="off" value="{{ old('edad') }}">
                                        <option>Sexo:</option>
                                        <option>Hombre</option>
                                        <option>Mujer</option>
                                    </SELECT>
                                </div>

                                <div class="col ">
                                    <input type="text" name="telefono"  class="form-control @error('telefono') is-invalid @enderror" autocomplete="off" value="{{ old('telefono') }}"
                                        placeholder="Telefono">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>   
                            </div>

                            <!-- /.Div para el USUARIO Y EMAIIL -->
                            <div class="form-group row"> 
                                <div class="col-md-6">
                                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" placeholder="Nombre de usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>
                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- /.CONTRASEÑAS -->
                            <div class="form-group row  ">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                                </div>
                            </div>
             
                            <!-- REGISTRAR -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




