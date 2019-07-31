<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructores;

class InstructoresController extends Controller
{
    public function index(Request $request)
    {
    // if (!$request->ajax()) return redirect('/');
      $instructores = Instructores::paginate(2);
  
    #
     $buscar = $request->buscar;
        $criterio = $request->criterio;
         
       if ($buscar==''){
            $instructores = Instructores::join('academia','instructor.id_academia','=','academia.id')
            ->select('academia.id as id_academia','academia.nombre as nombre_academia',
                     'instructor.id',
                     'instructor.nombre','instructor.telefono','instructor.apellido','instructor.email','instructor.condicion')
            ->orderBy('instructor.id', 'desc')->paginate(15);
        }
        else{
           $instructores = Instructores::join('academia','instructor.id_academia','=','academia.id')
            ->select('academia.id','academia.nombre as nombre_academia',
                     'instructor.id',
                     'instructor.nombre','instructor.telefono','instructor.apellido','instructor.email','instructor.condicion')
            ->where('instructor.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('instructor.id', 'desc')->paginate(15);
        }
         
        return [
            'pagination' => [
            'total'        => $instructores->total(),
                'current_page' => $instructores->currentPage(),
                'per_page'     => $instructores->perPage(),
                'last_page'    => $instructores->lastPage(),
                'from'         => $instructores->firstItem(),
                'to'           => $instructores->lastItem(),
            ],
            'instructores' => $instructores
        ];
    
    }
  
    public function todo(){
      $instructores = Instructores::orderBy('id', 'desc')->paginate(100);
      return ['instructores' => $instructores];
    }
  
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
           $instructores = new Instructores();
            $instructores->nombre = $request->nombre;
            $instructores->id_academia = $request->id_academia; 
            $instructores->email = $request->email;
            $instructores->telefono = $request->telefono;
            $instructores->apellido = $request->apellido; 
            $instructores->condicion = '1';      
            $instructores->save(); 

    }
 
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            //Buscar primero el proveedor a modificar
            $instructores = Instructores::findOrFail($request->id);
            $instructores->nombre = $request->nombre;
            $instructores->id_academia = $request->id_academia; 
            $instructores->email = $request->email;
            $instructores->telefono = $request->telefono;
            $instructores->apellido = $request->apellido; 
            $instructores->condicion = '1';         
            $instructores->save();
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $instructores = Instructores::findOrFail($request->id);
        $instructores->condicion = '0';
        $instructores->save();
    }
 
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $instructores = Instructores::findOrFail($request->id);
        $instructores->condicion = '1';
        $instructores->save();
    }
}
