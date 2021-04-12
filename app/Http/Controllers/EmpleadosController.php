<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estados;
use App\Models\empleados;

use Session;

class EmpleadosController extends Controller
{

 
   
  public function pruebaempleado($idem)


  {
    $consulta = empleados::withTrashed()->join('estados','empleados.idem','=','estados.ide')
      ->select('empleados.idem','empleados.nombre','empleados.apellido','estados.nombre as edo','empleados.email','empleados.celular','empleados.sexo','empleados.img')
        ->where('idem',$idem)
        ->get();
        $estados = estados::all();

    return view('pruebaempleado')

    ->with('consulta',$consulta[0])
    ->with('estados',$estados);

  }


public function guardarecambios(request $request)
    
    {
        $this->validate($request,[
            
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            
            'img' => 'image|mimes:gif,jpeg,png'
            
           
        ]);

        $file = $request->file('img');
        if($file<>"")
        {
        $img = $file->getClientOriginalName();
        $img2 = $request->idem . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }

       $empleados = empleados::find($request->idem);
       $empleados->idem = $request->idem;
       $empleados->nombre = $request->nombre;
      
       $empleados->apellido = $request->apellido;
       $empleados->celular = $request->celular;
       $empleados->email = $request->email;
       
       $empleados->sexo = $request->sexo;
       $empleados->ide = $request->ide;
       
       
       $file = $request->file('img');
        if($file<>"")
        {
       $empleados->img = $img2;
        }
       $empleados->save();
      Session::flash('mensaje',"EL EMPLEADO $request->nombre $request->apellido 
             HA SIDO MODIFICADO CORRRECTAMENTE");
        return redirect()->route('reporteempleado');

    //return view('elctronica/mensajes')
      //->with('proceso',"EL EMPLEADO SE MODIFICO CORRECTAMENTE")
    //->WITH('mensaje',"EL EMPLEADO $request->nombre $request->apellido_p
      //    HA SIDO MODIFICADO CORRECTAENTE");

    }
    /*
  public function guardarecambios(Request $request)

  {



$this->validate($request,[
            
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            
            'img' => 'image|mimes:gif,jpeg,png'
        ]);
        
        $file = $request->file('img');
        if($file<>"")
        {
        $img = $file->getClientOriginalName();
        $img2 = $request->idem . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 ="sinfoto.jpg"; 
        }

       $empleados = new empleados;
       $empleados->idem = $request->idem;
       $empleados->nombre = $request->nombre;
       $empleados->apellido = $request->apellido;
       
       $empleados->celular = $request->celular;
       $empleados->email = $request->email;
       
       
       $empleados->sexo = $request->sexo;
       $empleados->ide = $request->ide;
      
       
       $empleados->img = $img2;
       $empleados->save();

       Session::flash('mensaje',"EL EMPLEADO $request->nombre $request->apellido
       HA SIDO MODIFICADO CORRRECTAMENTE");
       return redirect()->route('reporteempleado');
  }

   /*public function modificaempleado($idem)
   {

    return view('modificaempleado');
   }
   */
   
   public function desactivaempleado($idem)
   {
     $empleados = empleados::find($idem);
     $empleados->delete();

     Session::flash('mensaje',"El empleado
                         ha sido desactivado correctamente");      
                         
         return redirect()->route('reporteempleado'); 
    
   }
    public function activaempleado($idem)
   {

    $empleados = empleados::withTrashed()->where('idem',$idem)->restore();
     
     Session::flash('mensaje',"El empleado
                         ha sido activado correctamente");      
                         
         return redirect()->route('reporteempleado'); 
    
   }
  public function borraempleado($idem)
   {

   $empleados = empleados::withTrashed()->find($idem)->forceDelete(); 
     
     Session::flash('mensaje',"EL empleado
                         ha sido borrada correctamente");      
                         
         return redirect()->route('reporteempleado'); 
     
   }

   public function reporteempleado()
   {

    $consulta = empleados::withTrashed()->join('estados','empleados.idem','=','estados.ide')
      ->select('empleados.idem','empleados.nombre','empleados.apellido','estados.nombre as edo','empleados.email','empleados.celular','empleados.sexo','empleados.deleted_at','empleados.img')
        ->orderBy('empleados.nombre')
        ->get();
        return view('reporteempleado')->with('consulta',$consulta);
   }





   public function altaempleado()

   {   

      

   	 $consulta = empleados::orderBy('idem','DESC')
      ->take(1)
      ->get();
      $cuantos = count($consulta);
      if ($cuantos==0)
       {
        $idesigue = 1;

      }
      else{
        $idesigue = $consulta[0]->idem + 1;
      }

      $estados = estados::orderBy('nombre')->get();

      return view('altaempleado')
              ->with('idsigue',$idesigue)
              ->with('estados', $estados);

      return view ('altaempleado');

   }


public function guardarempleado(request $request)
    {
        $this->validate($request,[
            
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü,]+$/',
            
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            
            'img' => 'image|mimes:gif,jpeg,png'
        ]);
        
        $file = $request->file('img');
        if($file<>"")
        {
        $img = $file->getClientOriginalName();
        $img2 = $request->idem . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 ="sinfoto.jpg"; 
        }

       $empleados = new empleados;
       $empleados->idem = $request->idem;
       $empleados->nombre = $request->nombre;
       $empleados->apellido = $request->apellido;
       
       $empleados->celular = $request->celular;
       $empleados->email = $request->email;
       
       
       $empleados->sexo = $request->sexo;
       $empleados->ide = $request->ide;
      
       
       $empleados->img = $img2;
       $empleados->save();

       Session::flash('mensaje',"EL EMPLEADO $request->nombre $request->apellido
       HA SIDO DADO DE ALTA CORRRECTAMENTE");
       return redirect()->route('reporteempleado');
  

  /* public function guardarempleado(Request $request)
   {
      //dd($request);
      //return $request;
      //return view ('altafactura');


      //'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      //'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      //'rfc' => 'required|regex:/^[A-Z]+$/',
      //'email' => 'required|email',
      //'celular' => 'required|regex:/^[0-9]{10}$/',
      //'municipio' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      //'domicilio' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
     // 'img'=>'image|mimes:gif,jpeg,png'

      //]);

      $file = $request->file('img');
      if($file<>"")
      {


      $img = $file->getClientOriginalName();
      $img2 = $request->idem . $img;

      \Storage::disk('local')->put($img2, \File::get($file));
      }
      else{
        $img2 = "sinfoto.jpg";
      }

      $empleados = new empleados;
        $empleados->idem = $request->idem;
        $empleados->nombre =$request->nombre;
        $empleados->apellido =$request->apellido;
        $empleados->email=$request->email;
        $empleados->celular =$request->celular;
        $empleados->sexo =$request->sexo;
        
        $empleados->ide =$request->ide;
        $empleados->img =$img2;
        $empleados->save(); 

     
        Session::flash('mensaje',"La factura
                         ha sido dada de alta correctamente");      
                         
         return redirect()->route('reporteempleado'); 
   }*/
}


}