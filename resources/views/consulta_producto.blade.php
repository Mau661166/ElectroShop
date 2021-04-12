@extends('electronica.index')

@section('contenido')
<div class="content-busqueda">
<div class="input-group-btn busquedaj" >
    <button class="btn btn-primary" id="busqueda">
        <i class="fa fa-search"></i> Busqueda
        <input id="name" type="text" class="form-control " name="name" placeholder="Busca aqui"  required autocomplete="name" autofocus>
     </button>
</div>
</div>



<div class="titulo-reporte">
    <h1>Reporte producto</h1>
</div>
<br>
<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

@if(Session::has('mensaje'))
<div class='alert alert-success'>{{Session::get('mensaje')}}</div>
@endif



<div class="ejercicio-tabla">

      <!--  <table class="table">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre producto</th>
                    <th>Descripcion</th>
                    <th>Numero de serie</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Proveedor</th>
                    <th>Garantia en tienda</th>
                    <th>Garantia exttendida</th>
                    <th>Precio compra</h>
                    <th>Precio venta</h>
                    <th>Opciones</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($consulta as $c)
                <tr>
                    <td data-label="Clave"><span class="block-id">{{$c->id_producto}}</span></td>
                    
                    <td data-label="Nombre producto">{{$c->nombre_producto}}</td>
                    <td data-label="Descripcion">{{$c->descripcion_producto}}</td>
                    <td data-label="Numero de serie">{{$c->numserie_producto}}</td>
                    <td data-label="Categoria">{{$c->catego}}</td>
                    <td data-label="Marca">{{$c->mar}}</td>
                    <td data-label="Proveedor">{{$c->prov}}</td>
                    <td data-label="Garantia en tienda">{{$c->garantiarienda_producto}}</td>
                    <td data-label="Garantia extendida">{{$c->garantiaextendida_producto}}</td>
                    <td data-label="Precio compra">{{$c->preciocompra_producto}}</td>
                    <td data-label="Precio venta">{{$c->precioventa_producto}}</td>
                    
                    <td>
                        @if($c->deleted_at)
                        <a href="{{route('activar_producto',['id_producto'=>$c->id_producto])}}">
                        <button type="button" class="btn btn-success">Activar</button>
                        </a>
                        <a href="{{route('borrar_producto',['id_producto'=>$c->id_producto])}}">
                        <button type="button" class="btn btn-warning">Borrar</button>
                        </a>
                        @else
                        <a href="{{route('desactiva_producto',['id_producto'=>$c->id_producto])}}">
                        <i class="fas fa-trash delete pd-seting-ed" title="Desactivar"></i>
                        </a>
                        @endif
                        <a href="{{route('modificar_producto',['id_producto'=>$c->id_producto])}}">
                        <i class="far fa-edit edit" title="Editar"></i>
                        </a>
                    </td>
                    </tr>
                    @endforeach



                    
                
            </tbody>
            </table>-->
        <center> 
        
                   
                                
                    <div class="table-responsive table--no-card m-b-40">
                    <center> 
                    <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                    <th>Clave</th>
                    <th>Nombre producto</th>
                    <th>Imagen de producto</th>
                    <th>Descripcion</th>
                    <th>Numero de serie</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Proveedor</th>
                    <th>Garantia en tienda</th>
                    <th>Garantia exttendida</th>
                    <th>Precio compra</h>
                    <th>Precio venta</h>
                    <th>Opciones</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($consulta as $c)
                <tr>
                    <td data-label="Clave"><span class="block-id">{{$c->id_producto}}</span></td>
                    
                    <td data-label="Nombre producto">{{$c->nombre_producto}}</td>
                    <td data-label="Descripcion"><img src = "{{asset ('archivos/'. $c->img)}}" height = 50 width=50></td>
                    <td data-label="Descripcion">{{$c->descripcion_producto}}</td>
                    <td data-label="Numero de serie">{{$c->numserie_producto}}</td>
                    <td data-label="Categoria">{{$c->catego}}</td>
                    <td data-label="Marca">{{$c->mar}}</td>
                    <td data-label="Proveedor">{{$c->prov}}</td>
                    <td data-label="Garantia en tienda">{{$c->garantiarienda_producto}}</td>
                    <td data-label="Garantia extendida">{{$c->garantiaextendida_producto}}</td>
                    <td data-label="Precio compra">{{$c->preciocompra_producto}}</td>
                    <td data-label="Precio venta">{{$c->precioventa_producto}}</td>
                    
                    <td>
                        @if($c->deleted_at)
                        <a href="{{route('activar_producto',['id_producto'=>$c->id_producto])}}">
                        <button type="button" class="btn btn-success">Activar</button>
                        </a>
                        <a href="{{route('borrar_producto',['id_producto'=>$c->id_producto])}}">
                        <button type="button" class="btn btn-warning">Borrar</button>
                        </a>
                        @else
                        <a href="{{route('desactiva_producto',['id_producto'=>$c->id_producto])}}">
                        <i class="fas fa-trash delete pd-seting-ed" title="Desactivar"></i>
                        </a>
                        @endif
                        <a href="{{route('modificar_producto',['id_producto'=>$c->id_producto])}}">
                        <i class="far fa-edit edit" title="Editar"></i>
                        </a>
                    </td>
                    </tr>
                    @endforeach

                                        </tbody>
                                    </table>
                                    </center> 
                                </div>
                            </div>
    </div>
  
<!------------------------------------------------------------*----------------------------------------------------------->
<br>
<br>
<br>




<!-----------------------------------------------------Paginacion--------------------------------------------------------->
<center>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="button" class="btn btn-secondary">1</button>
    <button type="button" class="btn btn-secondary">2</button>
    <button type="button" class="btn btn-secondary">3</button>
    <button type="button" class="btn btn-secondary">4</button>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="button" class="btn btn-secondary">5</button>
    <button type="button" class="btn btn-secondary">6</button>
    <button type="button" class="btn btn-secondary">7</button>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-secondary">8</button>
  </div>
</div>
</center>






<!------------------------------------------------------------------------------------------------------------------>




@stop