@extends('auth.contenido')

@section('login')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio de Sesion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="was-validated" >
                      {{csrf_field()}}
                       
                        <div class="form-group row mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required  autofocus>
                            {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                                
                            </div>
                        </div>

                        <div class="form-group row mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required >
                                 {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
                            </div>
                        </div>
<!-----<center>Usuario: jcarlosad7 Password: *jucardi7<br>

Usuario: almacenero password: almacenero<br>

Usuario: vendedor password:vendedor<br>----->
                      Ejemplos de Prueba<br>
                    *Administrador*  Usuario:admin password:admin <br>
                      *Contacto Principal*  Usuario:admin2 password:admin</center>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Acceder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
