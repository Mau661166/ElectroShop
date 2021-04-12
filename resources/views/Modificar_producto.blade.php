@extends('electronica.index')

@section('contenido')

<div class="ejercicio-form">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <center>
                <div class="card-header" id="registrarse">Modifica registro de producto</div>
              </center>
                <div class="card-body">
                    <form method="POST" action="{{route('guardarmodificacion')}}" enctype = 'multipart/form-data'>
                      {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ID:

                            

                            </label><br>
                            @if($errors->first("id_producto"))
                            <p class="text-danger">{{$errors->first("id_producto")}}</p>
                            @endif

                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input itype="text" class="form-control " id="id_producto" name="id_producto" value="{{$consulta->id_producto}}"  readonly = 'readonly' placeholder="Ejemplo: 72894"   autofocus>
                                   
                            </div>

                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del producto:
                               
                            </label><br>
                            @if($errors->first("nombre_producto"))
                            <p class="text-danger">{{$errors->first("nombre_producto")}}</id_pro>
                            @endif

                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control " id="nombre_producto" name="nombre_producto" value="{{$consulta->nombre_producto}}" placeholder="Ejemplo: Audifonos crusher"   autofocus>
                                   
                            </div>

                        </div>
                        <div class="col-sm-12">
                                <div class="area">
    <center>
      <label>Describe las caracteristicas del producto
              @if($errors->first("descripcion_producto"))
             <p class="text-danger">{{$errors->first("descripcion_producto")}}</id_pro>
              @endif
      </label>
    </center>
    <textarea class="form-control" rows="11" placeholder="" id="descripcion_producto" name="descripcion_producto" value="">
    {{$consulta->descripcion_producto}}
    </textarea>
  </div>

                        </div><br>






                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">N. de serie: 
                               
                            </label><br>
                            @if($errors->first("numserie_producto"))
                                <p class="text-danger">{{$errors->first("numserie_producto")}}</p>
                                 @endif


                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control " id="numserie_producto" name="numserie_producto" value="{{$consulta->numserie_producto}}" placeholder="Ejemplo: 89689648"   autofocus>
                                   
                            </div>

                        </div><br>
                       
                        <div class="form-group row mb-0">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Categoria de producto:</label>
                            
                            <div class="col-sm-5">
                                <select id="categoria_id" class="form-control" name="categoria_id" >
                                <option value="{{$consulta->consulta_id}}">{{$consulta->catego}} </option>
                                @foreach($categorias as $catego)
                                      <option value="{{$catego->id_categoria}}">{{$catego->nombre_categoria}}</option>
                                      @endforeach
                                      
                                      
                                </select>
                        </div>
                        </div> <br><br>


                        <div class="form-group row mb-0">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Marca:</label>
                            
                            <div class="col-sm-5">
                                <select id="marca_id" class="form-control" name="marca_id" >
                                <option value="{{$consulta->marca_id}}">{{$consulta->mar}} </option>
                                @foreach($marcas as $mar)
                                      <option value="{{$mar->id_marca}}">{{$mar->nombre_marca}}</option>
                                      @endforeach
                                      
                                      
                                </select>
                        </div>
                        </div><br><br>




                        <div class="form-group row mb-0">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Seleccione Prooverdor:</label>
                            
                            <div class="col-sm-5">
                                <select id="proveedor_id" class="form-control" name="proveedor_id" >
                                <option value="{{$consulta->proveedor_id}}">{{$consulta->prov}} </option>
                                    
                                @foreach($proveedores as $prov)
                                      <option value="{{$prov->id_proveedor}}">{{$prov->nombre_proveedor}}</option>
                                      @endforeach
                                </select>
                        </div>
                        </div><br><br>



                       <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>
                             <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control  " name="email" placeholder="example@gmail.com"  required autocomplete="email">

                            <i class="far fa-envelope"></i>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Password:</label>
                             <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">
                                <span>Ingresa tu password</span>

                                
                                  
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> Confirmar Password:</label>
                             <label for="name" class="col-md-1 col-form-label text-md-right asterisco ">*</label>


                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>-->

                      



                        <div class="form-group row mb-0">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Garantia en tienda:</label>
                          @if($consulta->garantiarienda_producto=='S')
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" id="garantiarienda_producto" name="garantiarienda_producto" value="S" checked>Si</label>
                                <label class="radio-inline"><input type="radio" id="garantiarienda_producto" name="garantiarienda_producto" value="N">No</label>
                            @else
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" id="garantiarienda_producto" name="garantiarienda_producto" value="S" >Si</label>
                                <label class="radio-inline"><input type="radio" id="garantiarienda_producto" name="garantiarienda_producto" value="N" checked>No</label>
                            @endif
                            </div>
                        </div>
                        


<br>


<div class="form-group row mb-0">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Garantia Extendida:</label>
                          @if($consulta->garantiaextendida_producto=='S')
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" id="garantiaextendida_producto" name="garantiaextendida_producto" value="S" checked>Si</label>
                                <label class="radio-inline"><input type="radio" id="garantiaextendida_producto" name="garantiaextendida_producto" value="N">No</label>
                            @else
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" id="garantiaextendida_producto" name="garantiaextendida_producto" value="S" >Si</label>
                                <label class="radio-inline"><input type="radio" id="garantiaextendida_producto" name="garantiaextendida_producto" value="N" checked>No</label>
                           @endif
                            </div>
                        </div>
               

                        

<!--<div class="form-group row mb-0"><
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Seleccione Area:</label>
                            
                            <div class="col-sm-5">
                                <select id="modulo" class="form-control" name="modulo_id" required="">
                                      <option selected="">Central Mexico </option>
                                      <option selected="">Central Mexico </option>
                                      <option selected="">Central Mexico </option>
                                </select>
                        </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Precio Compra:
                                
                            </label><br>
                            @if($errors->first("preciocompra_producto"))
                                <p class="text-danger">{{$errors->first("preciocompra_producto")}}</id_pro>
                                 @endif 

                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " id="preciocompra_producto" name="preciocompra_producto" value="{{$consulta->preciocompra_producto}}" placeholder="Ejemplo: 746.00"  autofocus>
                                   
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Precio venta:</label><br>
                            @if($errors->first("precioventa_producto"))
                                <p class="text-danger">{{$errors->first("precioventa_producto")}}</id_pro>
                                 @endif 

                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " id="precioventa_producto" name="precioventa_producto" value="{{$consulta->precioventa_producto}}" placeholder="Ejemplo: 999.00"   autofocus>
                                   
                            </div>

                        </div>






                        
    </div>
    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Imagen de producto:
                                <img src = "{{asset ('archivos/'. $consulta->img)}}" height = 150 width=150> 
                                @if($errors->first("img"))
                                <p class="text-danger">{{$errors->first("img")}}</id_pro>
                                 @endif 
                            <div class="col-md-6">
                                <input  type="file" class="" id="img" name="img" value="{{old('numserie_producto')}}">
                                   
                            </div>


<br>
<br>
<br>
<br>
<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                    <button type="submit" class="btn btn-outline-primary">
                                    Registrar
                                    </button>
                                   
                            </div>
                        </div>

                       
                        <br><br><br>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

   </div>





@stop