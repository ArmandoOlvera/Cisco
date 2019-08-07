<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Grupos;
use App\Academias;
use App\Historial;

class Grupos3Controller extends Controller
{
    //
  public function index(Request $request)
    { 
     //sentencia para manejar los criterios de busqueda para los grupos
     // $grupos = Grupos::paginate(2);
      $buscar = $request->buscar;
      $criterio = $request->criterio;
     //sentencia para manejar las busquedas de las grupos por criterios y sin ellos 
     /*   if ($buscar==''){
            $grupos = Grupos::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $grupos = Grupos::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
       */
    $idec=$request->id;
     $grupos = Historial::join('academia','historial.id_academia','=','academia.id')
            ->join('instructor','historial.id_instructor','=','instructor.id')
            ->join('materia','historial.id_materia','=','materia.id') 
            ->select('historial.id','historial.id_academia','historial.id_instructor','historial.status','historial.fecha_inicio','historial.id_materia','historial.fecha_oc','historial.condicion','historial.hora_preferida','historial.id_grupo',
                     'instructor.nombre as nombre_users', 'academia.nombre as nombre_academias', 'materia.nombre as nombre_materias')
            ->where('historial.id_academia',$idec)->paginate(15);
    
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
  //Funcion para obtener el id de la academia a la que pertenece el contacto principal
  public function obteneracademia(Request $request)
    {
    $academia=DB::table('academia as i')
        ->select(DB::raw('id')) 
           ->where('i.id_usuario',$request->id)
        ->orderBy('id', 'desc')
        ->get();
    return ['academia'=>$academia];
    }
  
  //Funcion para guardar grupos en la base de datos
  public function store(Request $request)
    {
    DB::table('grupos')->insert([['nombre' =>$request->nombre, 'descripcion' =>$request->descripcion,'condicion' =>  '1']]);
    }
  
 //Funcion para obtener resultados de los grupos, sus alumnos y definir las cantidades de alumnos reprobados, aprobados y alumnos en espera
    public function listarPDF(Request $request){
      $idec=$request->id;
       $historial3 = Historial::join('academia','historial.id_academia','=','academia.id')
            ->join('instructor','historial.id_instructor','=','instructor.id')
            ->join('materia','historial.id_materia','=','materia.id') 
            ->select('historial.id','historial.id_academia','historial.id_instructor','historial.status','historial.fecha_inicio','historial.id_materia','historial.fecha_oc','historial.condicion','historial.hora_preferida','historial.id_grupo',
                     'instructor.nombre as nombre_users', 'academia.nombre as nombre_academias', 'materia.nombre as nombre_materias')
            ->where('historial.id_instructor',$idec)
         ->where('historial.status','Aprobado')->get();
      
      $pdf = \PDF::loadView('pdf.grupos2pdf',['historial3'=>$historial3]);
      return $pdf->download('grupos2.pdf');
  }
  //Funcion para desactivar los grupos
  public function desactivar(Request $request)
    {
      DB::table('grupos')->where('id', $request->id)->update(['condicion' => '0']);
    }
 //Funcion para activar los grupos
    public function activar(Request $request)
    {
          DB::table('grupos')->where('id', $request->id)->update(['condicion' => '1']);
    }
 //Funcion para actualizar la informacion de los grupos
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
          DB::table('grupos')->where('id', $request->id)->update(['nombre' => $request->nombre, 'descripcion' => $request->descripcion]);
    }
}
