<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academias;

class AcademiaController extends Controller
{
    //
  public function index(Request $request)
    {
    
    //sentencia para manejar los criterios de busqueda para las academias
     $buscar = $request->buscar;
     $criterio = $request->criterio;
    //sentencia para manejar las busquedas de las academias por criterios y sin ellos 
        if ($buscar==''){
            $academias = Academias::join('users','academia.id_usuario','=','users.id')
            ->select('academia.id','academia.id_usuario','academia.nombre','academia.direccion','academia.direccion2','academia.pais','academia.estado','academia.ciudad','academia.codigo','academia.url','academia.institucion',
                     'academia.condicion',
                     'users.nombre as nombre_users','users.telefono','users.idrol','users.password','users.email')
            ->orderBy('academia.id', 'desc')->paginate(15);
        }
        else{
            $academias = Academias::join('users','academia.id_usuario','=','users.id')
            ->select('academia.id','academia.id_usuario','academia.nombre','academia.direccion','academia.direccion2','academia.pais','academia.estado','academia.ciudad','academia.codigo','academia.url','academia.institucion',
                     'academia.condicion',
                     'users.nombre as nombre_users','users.telefono','users.idrol','users.password','users.email')
            ->where('academia.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('academia.id', 'desc')->paginate(15);
        }
         
        return [
            'pagination' => [
            'total'        => $academias->total(),
                'current_page' => $academias->currentPage(),
                'per_page'     => $academias->perPage(),
                'last_page'    => $academias->lastPage(),
                'from'         => $academias->firstItem(),
                'to'           => $academias->lastItem(),
            ],
            'academia' => $academias
        ];
    
    }
  
  //funcion que realiza la busqueda y obtencion de datos para imprimir el pdf en forma de descargar
   public function listarPDF(){
     $academias = Academias::orderBy('id', 'desc')->get();
     $cont = Academias::count();
     $pdf = \PDF::loadView('pdf.academiaspdf',['academias'=>$academias,'cont'=>$cont]);
     return $pdf->download('academias.pdf');
  }
  
  //Funcion la cual obtiene las academias de forma sencilla para su muestreo
  public function selectAcademias(Request $request){
    if (!$request->ajax()) return redirect('/');
    $academias = Academias::where('condicion','=','1')->select('id','nombre')->orderBy('nombre','asc')->get(); 
    return ['academias' => $academias];
  }
  //Funcion de obtener todas las academias por id
    public function todo(){
      $academias = Academias::orderBy('id', 'desc')->paginate(100);
      return ['academia' => $academias];
    }
  
  //FUncion para realizar el guardado de las academias
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            $academias = new Academias();
            $academias->nombre = $request->nombre;
            $academias->id_usuario = $request->id_usuario; 
            $academias->direccion = $request->direccion;
            $academias->direccion2 = $request->direccion2;
            $academias->pais = $request->pais;
            $academias->estado = $request->estado;
            $academias->ciudad = $request->ciudad;
            $academias->codigo = $request->codigo;
            $academias->url = $request->url;
            $academias->institucion = $request->institucion;
            $academias->condicion = '1';      
            $academias->save();
    }
 //FUncion para actualizar las academias
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            //Buscar primero el proveedor a modificar
            $academias = Academias::findOrFail($request->id);
           $academias->nombre = $request->nombre;
            $academias->id_usuario = $request->id_usuario; 
            $academias->direccion2 = $request->direccion2;
      $academias->pais = $request->pais;
      $academias->estado = $request->estado;
      $academias->ciudad = $request->ciudad;
      $academias->codigo = $request->codigo;
      $academias->url = $request->url;
      $academias->institucion = $request->institucion;
            $academias->condicion = '1';      
            $academias->save();
    }
 //Funcion para desactivar las academias
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $academias = Academias::findOrFail($request->id);
        $academias->condicion = '0';
        $academias->save();
    }
 //Funcion para activar las academias
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $academias = Academias::findOrFail($request->id);
        $academias->condicion = '1';
        $academias->save();
    }
}
