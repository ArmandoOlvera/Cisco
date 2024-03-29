<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial;

class HistorialController extends Controller
{
    //
  public function index(Request $request)
    {
     //sentencia para manejar los criterios de busqueda para los resultados de los grupos
     $buscar = $request->buscar;
     $criterio = $request->criterio;
     //sentencia para manejar las busquedas de los resultados por criterios y sin ellos         
        if ($buscar==''){
            $historial = Historial::join('academia','historial.id_academia','=','academia.id')
            ->join('instructor','historial.id_instructor','=','instructor.id')
            ->join('materia','historial.id_materia','=','materia.id') 
            ->select('historial.id','historial.id_academia','historial.id_instructor','historial.status','historial.fecha_inicio','historial.id_materia','historial.fecha_oc','historial.condicion','historial.hora_preferida','historial.id_grupo',
                     'instructor.nombre as nombre_users', 'academia.nombre as nombre_academias', 'materia.nombre as nombre_materias')
            ->orderBy('historial.id', 'desc')->paginate(15);
        }
        else{
            $historial = Historial::join('academia','historial.id_academia','=','academia.id')
            ->join('instructor','historial.id_instructor','=','instructor.id')
            ->join('materia','historial.id_materia','=','materia.id') 
            ->select('historial.id','historial.id_academia','historial.id_instructor','historial.status','historial.fecha_inicio','historial.id_materia','historial.fecha_oc','historial.condicion','historial.hora_preferida','historial.id_grupo',
                     'instructor.nombre as nombre_users', 'academia.nombre as nombre_academias', 'materia.nombre as nombre_materias')
            ->where('historial.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('historial.id', 'desc')->paginate(15);
        }
         
        return [
            'pagination' => [
            'total'        => $historial->total(),
                'current_page' => $historial->currentPage(),
                'per_page'     => $historial->perPage(),
                'last_page'    => $historial->lastPage(),
                'from'         => $historial->firstItem(),
                'to'           => $historial->lastItem(),
            ],
            'historial' => $historial
        ];
    
    }
  
  
  //Funcion para guardar los resultados de los instructores de los grupos
    public function store(Request $request)
    {
          if (!$request->ajax()) return redirect('/');
          $historial = new Historial();
          $historial->id_academia = $request->id_academia;
          $historial->id_instructor  = $request->id_instructor;
          $historial->status  = $request->status;
          $historial->fecha_inicio  = $request->fecha_inicio;
          $historial->id_materia  = $request->id_materia;
          $historial->fecha_oc  = $request->fecha_oc;
          $historial->condicion = '0';
          $historial->hora_preferida  = $request->hora_preferida;
          $historial->id_grupo  = $request->id_grupo;
          $historial->save();/**/
    }
 //Funcion para actualizar la informacion de los resultados de los intructores
    public function update(Request $request)
    {
          if (!$request->ajax()) return redirect('/'); 
          $historial = Historial::findOrFail($request->id);
          $historial->id_academia = $request->id_academia;
          $historial->id_instructor  = $request->id_instructor;
          $historial->status  = $request->status;
          $historial->fecha_inicio  = $request->fecha_inicio;
          $historial->id_materia  = $request->id_materia;
          $historial->fecha_oc  = $request->fecha_oc;
          $historial->hora_preferida  = $request->hora_preferida;
          $historial->id_grupo  = $request->id_grupo; 
          $historial->save();
    }
 //FUncion para desactivar los grupos
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = Historial::findOrFail($request->id);
        $user->condicion = '0';
        $user->save();
    }
 //Funcion para activar los grupos
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = Historial::findOrFail($request->id);
        $user->condicion = '1';
        $user->save();
    }
}
