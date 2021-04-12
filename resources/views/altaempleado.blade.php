@extends('admin')
@section('contenido')
<div class="container">
<h1>Alta de empleados</h1>
<hr>

<form action = "{{route('guardarempleado')}}" method = "POST" enctype= 'multipart/form-data'>
    {{csrf_field()}}
      <div class="col-lg-12">
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
                    <input type="text" name="idem" id="idem" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="clave" tabindex="0">
                     </label>

                     <div class="form-group">
                         <label for="dni">FOTOS  </label>
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
                            <p class ='text-danger'>{{$errors->first('nombre')}}</p>
                            @endif  
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    @if($errors->first('apellido'))
                    <p class='text-danger'>{{$errors->first('apellido')}}
                    </p>	
                    @endif  
                    <input type="text" name="apellido" id="apellido" value="{{old('apellido')}}" 
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
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    @if($errors->first('celular'))
                    <p class='text-danger'>{{$errors->first('celular')}}
                    </p>	
                    @endif  
                    <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Celular" tabindex="5">
                </div>
            </div>

        </div>
        <div class="row">
            

            <div class="col-xs-6 col-sm-6 col-md-6">

              <div class="form-group">
                <label for="dni">Estado:</label>
                <select name = 'ide' value="{{old('estado')}}" class="custom-select">
                  <option selected="">Selecciona un estado</option>
                    @foreach($estados as $edo)
                    <option value="{{$edo->ide}}">{{$edo->nombre}}</option>
                    @endforeach
                </select>

              </div>

            </div>
              
         



            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="dni">Sexo:</label>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="razon2" name="sexo" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="razon2">Femenino</label>
                </div>


            </div>
        </div>
         <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="8"
                title="Guardar datos ingresados"></div>
        </div>
                                        
        </div>

    </form>
@stop