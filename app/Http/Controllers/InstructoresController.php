<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructores;

class InstructoresController extends Controller
{
    public function index(Request $request)
    {
      //sentencia para manejar los criterios de busqueda para los instructores
      $instructores = Instructores::paginate(2);
      $buscar = $request->buscar;
      $criterio = $request->criterio;
      //sentencia para manejar las busquedas de los instructores por criterios y sin ellos     
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
  //Funcion para descargar el listado de los instructores por pdf
   public function listarPDF(){
     $instructores = Instructores::orderBy('id', 'desc')->get();
     $cont = Instructores::count();
     $pdf = \PDF::loadView('pdf.instructorpdf',['instructores'=>$instructores,'cont'=>$cont]);
     return $pdf->download('instructor.pdf');
  }
  
  //Funcion para obtener todos los instructores
    public function todo(){
      $instructores = Instructores::orderBy('id', 'desc')->paginate(100);
      return ['instructores' => $instructores];
    }
  //Funcion para guardar todos los instructores
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
 //Funcione para actualizar los instructores
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
            $instructores = Instructores::findOrFail($request->id);
            $instructores->nombre = $request->nombre;
            $instructores->id_academia = $request->id_academia; 
            $instructores->email = $request->email;
            $instructores->telefono = $request->telefono;
            $instructores->apellido = $request->apellido; 
            $instructores->condicion = '1';         
            $instructores->save();
    }
 //Funcion para desactivar los instructores
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $instructores = Instructores::findOrFail($request->id);
        $instructores->condicion = '0';
        $instructores->save();
    }
 //Funcion para activar los instructores
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $instructores = Instructores::findOrFail($request->id);
        $instructores->condicion = '1';
        $instructores->save();
    }
}
