@extends('admin')
@section('contenido')

<div class="container">
    <h1>REPORTE DE EMPLEADOS</h1>
    <br>
    <a href="{{route('altaempleado')}} ">
    <button type="button" class="btn btn-success">Alta Empleado</button></a>
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
                                                <th>Sexo</th>
                                                <th>Estado</th>

                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($consulta as $c)
                                            <tr>
                                                <td><img src="{{asset('archivos/'.$c->img)}}" height="50" width="50"></td>
                                                <td>{{$c->idem}}</td>
                                                <td>{{$c->nombre}} {{$c->apellido}}</td>
                                                <td>{{$c->email}}</td>
                                                <td>{{$c->celular}}</td>
                                                <td>{{$c->sexo}}</td>
                                                
                                                <td>{{$c->edo}}</td>


                                <td>
                                 <a href="{{route('pruebaempleado',['idem'=>$c->idem])}} ">                
                                <button type="button" class="btn btn-info">Modificar</button></a>

                                @if($c->deleted_at)                 
                                <a href="{{route('activaempleado',['idem'=>$c->idem])}} ">
                                <button type="button" class="btn btn-warning">Activar</button></a>
                                <a href="{{route('borraempleado',['idem'=>$c->idem])}} ">
                                <button type="button" class="btn btn-secondary">Borrar</button></a>
                                @else
                                 <a href="{{route('desactivaempleado',['idem'=>$c->idem])}} ">
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