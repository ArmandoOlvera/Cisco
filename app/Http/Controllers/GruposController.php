<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Grupos;


class GruposController extends Controller
{
    //
  public function index(Request $request)
    {
    // if (!$request->ajax()) return redirect('/');
      $grupos = Grupos::paginate(2);
  
    #
     $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $grupos = Grupos::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $grupos = Grupos::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
         
        return [
            'pagination' => [
            'total'        => $grupos->total(),
                'current_page' => $grupos->currentPage(),
                'per_page'     => $grupos->perPage(),
                'last_page'    => $grupos->lastPage(),
                'from'         => $grupos->firstItem(),
                'to'           => $grupos->lastItem(),
            ],
            'grupos' => $grupos
        ];
    
    }
  
   public function selectContactos(Request $request){
    // if (!$request->ajax()) return redirect('/');
      $grupos = Usuarios::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre','asc')->get();
    
    return ['usuarios' => $grupos];
  }
  
  
    /*public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            $persona = new Usuarios();
            $persona->nombre = $request->nombre;
            $persona->idrol = $request->idrol; 
            $persona->email = $request->email;
            $persona->telefono = $request->telefono;
            $persona->usuario = $request->usuario;
      
      $persona->apellido = $request->apellido;
      $persona->cargo = $request->cargo;
      $persona->pais = $request->pais;
      $persona->extension = $request->extension;
      $persona->idioma = $request->idioma;
      
            $persona->password = bcrypt( $request->password);
            $persona->condicion = '1';      
            $persona->save();
            
    }
 
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            //Buscar primero el proveedor a modificar
            $persona = Usuarios::findOrFail($request->id);
           $persona->nombre = $request->nombre;
            $persona->idrol = $request->idrol; 
            $persona->email = $request->email;
            $persona->telefono = $request->telefono;
            $persona->usuario = $request->usuario;
      $persona->apellido = $request->apellido;
      $persona->cargo = $request->cargo;
      $persona->pais = $request->pais;
      $persona->extension = $request->extension;
      $persona->idioma = $request->idioma;
      
            $persona->password = bcrypt( $request->password);
            $persona->condicion = '1';      
            $persona->save();
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = Usuarios::findOrFail($request->id);
        $user->condicion = '0';
        $user->save();
    }
 
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $user = Usuarios::findOrFail($request->id);
        $user->condicion = '1';
        $user->save();
    }*/
}
