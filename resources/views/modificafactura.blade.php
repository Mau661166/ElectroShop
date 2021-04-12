@extends('admin')
@section('contenido')
<div class="container">
<h1>Modifica Factura</h1>
<hr>

<form action = "{{route('guardacambios')}}" method = "POST" enctype="multipart/form-data">
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
                    @if($errors->first('idf'))
                    <p class='text-danger'>{{$errors->first('idf')}}
                    </p>	
                    @endif              
                    <input type="text" name="idf" id="idf" value="{{$consulta->idf}}" readonly='readonly' class="form-control" placeholder="clave" tabindex="0">
                     </label>
                     <div class="form-group">
                         <label for="dni">FOTO </label>
                         <img src="{{asset('archivos/'.$consulta->img)}}" height="150" width="150">
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
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="rfc">RFC</label>
                    @if($errors->first('rfc'))
                    <p class='text-danger'>{{$errors->first('rfc')}}
                    </p>	
                    @endif  
                    <input type="text" name="rfc" id="rfc" value="{{$consulta->rfc}}" class="form-control" placeholder="rfc" tabindex="3">
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

            </div>
              
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    @if($errors->first('domicilio'))
                    <p class='text-danger'>{{$errors->first('domicilio')}}
                    </p>	
                    @endif  
                    <input type="text" name="domicilio" id="domicilio" value="{{$consulta->domicilio}}"class="form-control" placeholder="domicilio" tabindex="7">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="dni">Razon:</label>
                @if($consulta->razon=='Moral')
                <div class="custom-control custom-radio">
                <input type="radio" id="razon1" name="razon"  value = "Moral" class="custom-control-input" checked="">
                <label class="custom-control-label" for="razon1">Moral</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="razon2" name="razon" value = "Fisica" class="custom-control-input">
                <label class="custom-control-label" for="razon2">Fisica</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="razon1" name="razon"  value = "Moral" class="custom-control-input" >
                <label class="custom-control-label" for="razon1">Moral</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="razon2" name="razon" value = "Fisica" class="custom-control-input" checked="">
                <label class="custom-control-label" for="razon2">Fisica</label>
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