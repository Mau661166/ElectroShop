@extends('admin')
@section('contenido')

<div class="container">
	<h1>REPORTE DE FACTURAS</h1>
	<br>
	<a href="{{route('altafactura')}} ">
	<button type="button" class="btn btn-success">Alta Factura</button></a>
	<br>
	<br>
  @if(Session::has('mensaje'))
  <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  <br>
	
                                <div class="table-responsive table--no-card m-b-100">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Foto</th> 
                                                <th>Clave</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th>Celular</th>
                                                <th>RFC</th>
                                                <th>Razon Social</th>
                                                <th>Domicilio</th>
                                                <th>Estado</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	@foreach($consulta as $c)
                                            <tr>
                                                <td><img src="{{asset('archivos/'.$c->img)}}" height="50" width="50"></td>
                                                <td>{{$c->idf}}</td>
                                                <td>{{$c->nombre}} {{$c->apellido}}</td>
                                                <td>{{$c->email}}</td>
                                                <td>{{$c->celular}}</td>
                                                <td>{{$c->rfc}}</td>
                                                <td>{{$c->razon}}</td>
                                                <td>{{$c->domicilio}}</td>
                                                <td>{{$c->edo}}</td>


                                <td>
                                 <a href="{{route('modificafactura',['idf'=>$c->idf])}} ">                
                                <button type="button" class="btn btn-info">Modificar</button></a>

                                @if($c->deleted_at)                	
                                <a href="{{route('activafactura',['idf'=>$c->idf])}} ">
                               	<button type="button" class="btn btn-warning">Activar</button></a>
                                <a href="{{route('borrafactura',['idf'=>$c->idf])}} ">
                                <button type="button" class="btn btn-secondary">Borrar</button></a>
                               	@else
                               	 <a href="{{route('desactivafactura',['idf'=>$c->idf])}} ">
                               	<button type="button" class="btn btn-danger">Desactivar</button></a>
                               	@endif
                               </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
</div>
@stop