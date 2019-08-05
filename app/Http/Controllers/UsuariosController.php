<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Usuarios;


class UsuariosController extends Controller
{
    //
  public function index(Request $request)
    {
      //sentencia para manejar los criterios de busqueda para los usuarios
      $usuarios = Usuarios::paginate(2);
      $buscar = $request->buscar;
      $criterio = $request->criterio;
      //sentencia para manejar las busquedas de los usuarios por criterios y sin ellos    
        if ($buscar==''){
            $usuarios = Usuarios::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $usuarios = Usuarios::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
         
        return [
            'pagination' => [
            'total'        => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page'     => $usuarios->perPage(),
                'last_page'    => $usuarios->lastPage(),
                'from'         => $usuarios->firstItem(),
                'to'           => $usuarios->lastItem(),
            ],
            'usuarios' => $usuarios
        ];
    
    }
  
  public function listarPDF(){
    
     $usuarios = Usuarios::orderBy('id', 'desc')->get();
    
     $cont = Usuarios::count();
    $pdf = \PDF::loadView('pdf.usuariospdf',['usuarios'=>$usuarios,'cont'=>$cont]);
    
    return $pdf->download('usuarios.pdf');
  }
  
  
   public function selectContactos(Request $request){
    // if (!$request->ajax()) return redirect('/');
      $usuarios = Usuarios::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre','asc')->get();
    
    return ['usuarios' => $usuarios];
  }
  
   public function selectContactos2(Request $request){
    // if (!$request->ajax()) return redirect('/');
      $usuarios = Usuarios::where('idrol','<>',$request->idrol)
        ->select('id','nombre')->orderBy('nombre','asc')->get();
    
    return ['usuarios' => $usuarios];
  }
  
    public function store(Request $request)
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
    }
}
