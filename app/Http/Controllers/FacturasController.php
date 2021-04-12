<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estados;
use App\Models\facturas;
use Session;

class FacturasController extends Controller
{

   public function index()
   {
      return view ('admin');
   } 

   public function modificafactura($idf)
   {

    $consulta = facturas::withTrashed()->join('estados','facturas.idf','=','estados.ide')
      ->select('facturas.idf','facturas.nombre','facturas.apellido','estados.nombre as edo','facturas.ide','facturas.rfc','facturas.email','facturas.celular','facturas.domicilio','facturas.razon','facturas.img')
        ->where('idf',$idf)
        ->get();
        
        $estados = estados::all();

    return view ('modificafactura')
    ->with('consulta',$consulta[0])
    ->with('estados',$estados);

   }

   public function guardacambios(Request $request)
   {
     $this->validate($request,[
      
      'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      
      'email' => 'required|email',
      'celular' => 'required|regex:/^[0-9]{10}$/',
       'img' => 'image|mimes:gif,jpeg,png',
      'domicilio' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/'

      ]);

      $file = $request->file('img');
      if($file<>"")
      {


      $img = $file->getClientOriginalName();
      $img2 = $request->idf . $img;

      \Storage::disk('local')->put($img2, \File::get($file));
      }
      else{
        $img2 = "sinfoto.jpg";
      }
      

      $facturas = facturas::withTrashed()->find($request->idf);
        $facturas->idf = $request->idf;
        $facturas->nombre =$request->nombre;
        $facturas->apellido =$request->apellido;
        $facturas->email=$request->email;
        $facturas->celular =$request->celular;
        $facturas->razon =$request->razon;
        $facturas->rfc =$request->rfc;
        $facturas->domicilio =$request->domicilio;
        $facturas->ide =$request->ide;
        if($file<>"")
        {
        $facturas->img= $img2 ;
        }
        $facturas->save(); 


        Session::flash('mensaje',"La factura
                         ha sido modificada correctamente");      
                         
         return redirect()->route('reportefactura');                  
        
   }
   public function desactivafactura($idf)
   {
     $facturas = facturas::find($idf);
     $facturas->delete();

     Session::flash('mensaje',"La factura
                         ha sido desactivada correctamente");      
                         
         return redirect()->route('reportefactura'); 
   }
    public function activafactura($idf)
   {

    $facturas = facturas::withTrashed()->where('idf',$idf)->restore();
     
     Session::flash('mensaje',"La factura
                         ha sido activada correctamente");      
                         
         return redirect()->route('reportefactura'); 
    
   }
  public function borrafactura($idf)
   {

   $facturas = facturas::withTrashed()->find($idf)->forceDelete(); 
     
     Session::flash('mensaje',"La factura
                         ha sido borrada correctamente");      
                         
         return redirect()->route('reportefactura'); 
     
   }

   public function reportefactura()
   {

    $consulta = facturas::withTrashed()->join('estados','facturas.idf','=','estados.ide')
      ->select('facturas.idf','facturas.nombre','facturas.apellido','estados.nombre as edo','facturas.rfc','facturas.email','facturas.celular','facturas.domicilio','facturas.razon','facturas.deleted_at','facturas.img')
        ->orderBy('facturas.nombre')
        ->get();
        return view('reportefactura')->with('consulta',$consulta);
   }

   public function altafactura()
   {   
      $consulta = facturas::orderBy('idf','DESC')
      ->take(1)
      ->get();
      $cuantos = count($consulta);
      if ($cuantos==0)
       {
        $idesigue = 1;

      }
      else{
        $idesigue = $consulta[0]->idf + 1;
      }

      $estados = estados::orderBy('nombre')->get();

      return view('altafactura')
              ->with('idsigue',$idesigue)
              ->with('estados', $estados);

      //return view ('altafactura');

   }

 public function guardarfactura(Request $request)
   {
      //dd($request);
      //return $request;
      //return view ('altafactura');


     $this->validate($request,[
      
      'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/',
      
      'email' => 'required|email',
      'celular' => 'required|regex:/^[0-9]{10}$/',
       'img' => 'image|mimes:gif,jpeg,png',
      'domicilio' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í´,ó,ú]+$/'

      ]);

      $file = $request->file('img');
      if($file<>"")
      {


      $img = $file->getClientOriginalName();
      $img2 = $request->idf . $img;

      \Storage::disk('local')->put($img2, \File::get($file));
      }
      else{
        $img2 = "sinfoto.jpg";
      }

      $facturas = new facturas;
        $facturas->idf = $request->idf;
        $facturas->nombre =$request->nombre;
        $facturas->apellido =$request->apellido;
        $facturas->email=$request->email;
        $facturas->celular =$request->celular;
        $facturas->razon =$request->razon;
        $facturas->rfc =$request->rfc;
        $facturas->domicilio =$request->domicilio;
        $facturas->ide =$request->ide;
        $facturas->img =$img2;
        $facturas->save(); 

     
        Session::flash('mensaje',"La factura
                         ha sido dada de alta correctamente");      
                         
         return redirect()->route('reportefactura'); 
   }
   

   

  public function saludo(){
    return view ('facturas');
  }
   public function mensaje()
   {
    return "Hola Trabajador";
   }

   public function pago()
   {
    $diast =7;
    $pago = 600;
    $nomina = $diast * $pago;
    return "el pago del empleado es: $nomina";
   }
   public function nomina($diast, $pago)
   {
    $nomina =  $diast * $pago;
    dd($nomina,$pago,$diast);
    return "el pago es $nomina con $diast y pago diario $pago";
   }

public function eloquent()
{

   //$consulta =  facturas::all();
  /* $facturas = new Facturas;
        $facturas->idf = 3;
        $facturas->nombre ="Pedro";
        $facturas->apellido ="Perez";
        $facturas->email="Wallmart@pedro.com";
        $facturas->celular ="12344567890";
        $facturas->razon ="F";
        $facturas->rfc ="asdfghjklñ";
        $facturas->domicilio ="Verazcruz";
        $facturas->ide =1;
        $facturas->save(); 

        $facturas = facturas::find(1);
        $facturas->nombre = "Dulce";
        $facturas->apellido = "Gutz";
        $facturas->save();*/

    /* $facturas = facturas::find(1);
     $facturas->delete();  */ 
     //$consulta =  facturas::all();

     //$consulta = facturas::withTrashed()->get(); 
     //$consulta = facturas::onlyTrashed()->get();
    // facturas::withTrashed()->where('idf',1)->restore();
     //return $consulta;

     //$facturas = facturas::find(1)->forceDelete();

     //$consulta = facturas::all();
     //return $consulta;
     //return "Restauracion realizada";

}




}



