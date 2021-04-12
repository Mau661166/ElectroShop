<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\categorias;
use App\Models\marcas;
use App\Models\proveedores;

use Session;

class ProductosController extends Controller
{


    public function producto()
    {
        $consulta = productos::orderBy('id_producto','DESC')->take(1)->get();
        //return $consulta;

        $cuantos =count ($consulta);
        if ($cuantos==0){
            $idsigue = 1;
        }

        else {
            $idsigue =$consulta[0]->id_producto + 1;
        }
        $categorias = categorias::orderBy('nombre_categoria')->get();
        $marcas = marcas::orderBy('nombre_marca')->get();
        $proveedores = proveedores::orderBy('nombre_proveedor')->get();

       // return $idsigue;
        return view ('electronica/producto')
        -> with('idsigue',$idsigue)
        -> with('categorias',$categorias)
        -> with('marcas',$marcas)
        -> with('proveedores',$proveedores);
    } 

    public function guardarproducto(Request $request)
    {
        $this->validate($request,[

            
            //"nombre_producto"=> "required|regex:/^[A-Z]*[A-Z,a-z, ,á,é,í,ó,ú]+[0-9]*$/",
           "descripcion_producto"=> "required",
            "numserie_producto"=> "required|regex:/^[0-9]{8}$/",
            "preciocompra_producto"=> "required|regex:/^[0-9]+$/",
            "precioventa_producto"=> "required|regex:/^[0-9]+$/",
            "img"=>"image|mimes:gif,gif,jpeg,png",

        ]);

        $file = $request->file('img');
        if($file<>""){
        $img =$file->getClientOriginalName();
        $img2 = $request->id_producto . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else {
            $img2 = "sinfoto.jpg";
        }

    $productos = new productos;
    $productos->id_producto=$request->id_producto;
    $productos->nombre_producto=$request->nombre_producto;
    $productos->descripcion_producto=$request->descripcion_producto;
    $productos->numserie_producto=$request->numserie_producto;
    $productos->categoria_id=$request->categoria_id;
    $productos->marca_id=$request->marca_id;
    $productos->proveedor_id=$request->proveedor_id;
    $productos->preciocompra_producto=$request->preciocompra_producto;
    $productos->precioventa_producto=$request->precioventa_producto;
    $productos->garantiarienda_producto=$request->garantiarienda_producto;  
    $productos->garantiaextendida_producto=$request->garantiaextendida_producto;
    $productos->img=$img2;
    $productos->save();
    

/*return view ('electronica/mensajes')->with('proceso',"Alta de productos")->
with('mensaje',"El producto $request->nombre_producto ha sido dado de alta correctamente ");*/

 Session::flash('mensaje',"El producto  ha sido agregado correctamente ");
    return redirect()->route('consulta_producto');

        }

    public function consulta_producto()
    {


         $consulta = productos::withTrashed()->join('categorias','productos.categoria_id','=','categorias.id_categoria')
         ->join('marcas','productos.marca_id','=','marcas.id_marca')
         ->join('proveedores','productos.proveedor_id','=','proveedores.id_proveedor')
        ->select('productos.id_producto','productos.nombre_producto','productos.descripcion_producto',
        'productos.numserie_producto','categorias.nombre_categoria as catego','marcas.nombre_marca as mar','proveedores.nombre_proveedor as prov',
        'productos.preciocompra_producto','productos.precioventa_producto',
        'productos.garantiarienda_producto','productos.garantiaextendida_producto','productos.deleted_at','productos.img')
        ->orderBy('productos.nombre_producto')
        ->get();
    
       // return $consulta;
        return view ('electronica/consulta_producto')
        ->with('consulta',$consulta);
    
        
/*--------------------------------------------------------------------*/ 
       /* $datos['consulta']=productos::withTrashed()->paginate(100);
        return view ('electronica/consulta_producto',$datos);*/

/*-------------------------------------------------------------------------*/    


      
    } 

    public function desactiva_producto($id_producto){
        $productos = productos::find($id_producto);
        $productos->delete();
       /* return view ('electronica/mensajes')
        ->with('proceso',"Desactivar productos")
        ->with('mensaje',"El producto  ha sido desactivado correctamente");*/
        //echo "el producto eliminado es $id_producto";
        Session::flash('mensaje',"El producto  ha sido desactivado correctamente ");
        return redirect()->route('consulta_producto');
    }

    public function activar_producto($id_producto){
        $productos = productos::withTrashed()->where('id_producto',$id_producto)->restore();
        Session::flash('mensaje',"El producto  ha sido activado correctamente ");
        return redirect()->route('consulta_producto');
        /*return view ('electronica/mensajes')
        ->with('proceso',"activar productos")
        ->with('mensaje',"El producto  ha sido activado correctamente");*/
        //echo "el producto eliminado es $id_producto";
    }

    public function borrar_producto($id_producto){
        $productos = productos::withTrashed()->find($id_producto)->forcedelete();
       /* return view ('electronica/mensajes')
        ->with('proceso',"borrar productos")
        ->with('mensaje',"El producto  ha sido borrado correctamente");*/
        //echo "el producto eliminado es $id_producto";
        Session::flash('mensaje',"El producto  ha sido borrado correctamente ");
        return redirect()->route('consulta_producto');
    }

   


    public function modificar_producto($id_producto){


        $consulta = productos::withTrashed()->join('categorias','productos.categoria_id','=','categorias.id_categoria')
        ->join('marcas','productos.marca_id','=','marcas.id_marca')
        ->join('proveedores','productos.proveedor_id','=','proveedores.id_proveedor')
       ->select('productos.id_producto','productos.nombre_producto','productos.descripcion_producto',
       'productos.numserie_producto','categorias.nombre_categoria as catego','marcas.nombre_marca as mar','proveedores.nombre_proveedor as prov',
       'productos.preciocompra_producto','productos.precioventa_producto',
       'productos.garantiarienda_producto','productos.garantiaextendida_producto','productos.img')
       ->where('id_producto',$id_producto)
       ->get();
        $categorias = categorias::all();
        $marcas = marcas::all();
        $proveedores = proveedores::all();
        return view('electronica/Modificar_producto')
        ->with('consulta',$consulta[0])
        ->with('categorias',$categorias)
        ->with('marcas',$marcas)
        ->with('proveedores',$proveedores);

/*$datos['consulta']=productos::where('id_producto',$id_producto)
        ->get();

        return view('electronica/Modificar_producto',$datos)
        ->with('datos',$datos[0]);*/
    }

    public function guardarmodificacion(Request $request){

        $this->validate($request,[

            
            //"nombre_producto"=> "required|regex:/^[A-Z]*[A-Z,a-z, ,á,é,í,ó,ú]+[0-9]*$/",
           "descripcion_producto"=> "required",
            "numserie_producto"=> "required|regex:/^[0-9]{8}$/",
            "preciocompra_producto"=> "required",
            "precioventa_producto"=> "required",
            "img"=>"image|mimes:gif,gif,jpeg,png",

        ]);

        $file = $request->file('img');
        if($file<>""){
        $img =$file->getClientOriginalName();
        $img2 = $request->id_producto . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        


    $productos = productos::find($request->id_producto);
    $productos->id_producto=$request->id_producto;
    $productos->nombre_producto=$request->nombre_producto;
    $productos->descripcion_producto=$request->descripcion_producto;
    $productos->numserie_producto=$request->numserie_producto;
    $productos->categoria_id=$request->categoria_id;
    $productos->marca_id=$request->marca_id;
    $productos->proveedor_id=$request->proveedor_id;
    $productos->preciocompra_producto=$request->preciocompra_producto;
    $productos->precioventa_producto=$request->precioventa_producto;
    $productos->garantiarienda_producto=$request->garantiarienda_producto;  
    $productos->garantiaextendida_producto=$request->garantiaextendida_producto;
    if($file<>"")
    {
    $productos->img=$img2;
    }
    $productos->save();
    

    /*return view ('electronica/mensajes')->with('proceso',"Modifiacion del producto")->
    with('mensaje',"El producto $request->nombre_producto ha sido dado modificado correctamente ");*/
    Session::flash('mensaje',"El producto  ha sido modificado correctamente ");
    return redirect()->route('consulta_producto');


    }

    


    
    
 


   
   


   



}
