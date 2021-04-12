@extends('admin')
@section('contenido')

<div class="container">
<h1>Modifica empleados</h1>
<hr>

<form action = "{{route('guardarecambios')}}" method = "POST" enctype= 'multipart/form-data'>
    {{csrf_field()}}
      <div class="col-lg-15">
         <div class="card">
            <div class="card-header">
                <strong>Ingrese sus datos
                </strong>
             </div>

            <div class="card-body card-block">
                <div class="row">
                    <label>    
                    @if($errors->first('idem'))
                    <p class='text-danger'>{{$errors->first('idem')}}
                    </p>	
                    @endif              
                    <input type="text" name="idem" id="idem" value="{{$consulta->idem}}" readonly='readonly' class="form-control" placeholder="clave" tabindex="0">
                     </label>

                    <div class="form-group">
                         <label for="dni">FOTO </label>
                         <img src="{{asset('archivos/'.$consulta->img)}}" height="100" width="100">
                          @if($errors->first('img'))
                    <p class='text-danger'>{{$errors->first('img')}}
                    </p>    
                    @endif  
                         <input type='file'  name="img" id="img" class="form-control " tabindex="9">
                             
                         
                     </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    @if($errors->first('nombre'))
                    <p class='text-danger'>{{$errors->first('nombre')}}
                    </p>	
                    @endif  
                <input type="text" name="nombre" id="nombre" value="{{$consulta->nombre}}" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    @if($errors->first('apellido'))
                    <p class='text-danger'>{{$errors->first('apellido')}}
                    </p>	
                    @endif  
                    <input type="text" name="apellido" id="apellido" value="{{$consulta->apellido}}" 
                    class="form-control" placeholder="Apellido" tabindex="2">
                </div>
            </div>
            
        </div>
        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    @if($errors->first('email'))
                    <p class='text-danger'>{{$errors->first('email')}}
                    </p>	
                    @endif  
                    <input type="email" name="email" id="email" value="{{$consulta->email}}" class="form-control" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    @if($errors->first('celular'))
                    <p class='text-danger'>{{$errors->first('celular')}}
                    </p>	
                    @endif  
                    <input type="text" name="celular" id="celular" value="{{$consulta->celular}}" class="form-control" placeholder="Celular" tabindex="5">
                </div>
            </div>

        </div>
        <div class="row">
            

              <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">
                <label for="dni">Estado:</label>
                <select name = 'ide'  class="custom-select">
                  <option value="{{$consulta->ide}}">{{$consulta->edo}}</option>
                    @foreach($estados as $edo)
                    <option value="{{$edo->ide}}">{{$edo->nombre}}</option>
                    @endforeach
                    
                </select>


            </div>
         



            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="dni">Sexo:</label>
                @if($consulta->sexo=='M')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino </label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input" checked="">
                <label class="custom-control-label" for="razon2">Femenino</label>
                </div>
                @endif

            </div>
        </div>
         <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="8"
                title="Guardar datos ingresados"></div>
        </div>
                                        
        </div>

    </form>
  
@stop