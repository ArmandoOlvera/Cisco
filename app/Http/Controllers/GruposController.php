<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Grupos;
use App\Academias;
use App\Historial;

class GruposController extends Controller
{
    //
  public function index(Request $request)
    {
    
     //sentencia para manejar los criterios de busqueda para los grupos
      $grupos = Grupos::paginate(2);
      $buscar = $request->buscar;
      $criterio = $request->criterio;
     //sentencia para manejar las busquedas de las grupos por criterios y sin ellos 
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
  
  
  //Funcion para guardar grupos en la base de datos
  public function store(Request $request)
    {
    DB::table('grupos')->insert([['nombre' =>$request->nombre, 'descripcion' =>$request->descripcion,'condicion' =>  '1']]);
    }
  
 //Funcion para obtener resultados de los grupos, sus alumnos y definir las cantidades de alumnos reprobados, aprobados y alumnos en espera
    public function listarPDF(Request $request){
       $historial = Academias::join('historial','academia.id','=','historial.id_academia')
            ->selectRaw('academia.nombre,count(*) as total')
             ->where('historial.id_grupo', $request->id)
            ->where('historial.status', 'Reprobado')
            ->groupBy('academia.nombre')->get();
      $historial2 = Academias::join('historial','academia.id','=','historial.id_academia')
            ->selectRaw('academia.nombre,count(*) as total')
             ->where('historial.id_grupo', $request->id)
            ->where('historial.status', 'Aprobado')
            ->groupBy('academia.nombre')->get();
      $historial3 = Academias::join('historial','academia.id','=','historial.id_academia')
            ->selectRaw('academia.nombre,count(*) as total')
             ->where('historial.id_grupo', $request->id)
            ->where('historial.status', 'Espera')
            ->groupBy('academia.nombre')->get();
      $cont=  Historial::where('status', 'Reprobado')->where('id_grupo', $request->id)->count();
      $cont2=  Historial::where('status', 'Aprobado')->where('id_grupo', $request->id)->count();
      $cont3=  Historial::where('status', 'Espera')->where('id_grupo', $request->id)->count();
      $total = $cont+$cont2+$cont3;
      if($total==0){
        $total=1;
      }
      $paprobado=($cont2/$total)*100;
      $preprobado=($cont/$total)*100;
      $pdf = \PDF::loadView('pdf.grupospdf',['total'=>$total,'preprobado'=>$preprobado,'paprobado'=>$paprobado,'cont'=>$cont,'cont2'=>$cont2,'cont3'=>$cont3,'historial'=>$historial,'historial2'=>$historial2,'historial3'=>$historial3]);
      return $pdf->download('grupos.pdf');
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
