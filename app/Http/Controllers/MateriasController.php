<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Materias;


class MateriasController extends Controller
{
    //
  public function index(Request $request)
    {
      //sentencia para manejar los criterios de busqueda para las materias
      $materias = Materias::paginate(2); 
      $buscar = $request->buscar;
      $criterio = $request->criterio;
      //sentencia para manejar las busquedas de las materias por criterios y sin ellos     
        if ($buscar==''){
            $materias = Materias::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $materias = Materias::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        return [
            'pagination' => [
            'total'        => $materias->total(),
                'current_page' => $materias->currentPage(),
                'per_page'     => $materias->perPage(),
                'last_page'    => $materias->lastPage(),
                'from'         => $materias->firstItem(),
                'to'           => $materias->lastItem(),
            ],
            'materias' => $materias
        ];
    }
    //Funcion para descargar el listado de las materias por pdf
     public function listarPDF(){
     $materias = Materias::orderBy('id', 'desc')->get();
     $cont = Materias::count();
     $pdf = \PDF::loadView('pdf.materiaspdf',['materias'=>$materias,'cont'=>$cont]);
     return $pdf->download('materias.pdf');
  } 
  //Funcion para obtener todas las materias
    public function todo(){
      $materias = Materias::orderBy('id', 'desc')->paginate(100);
      return ['materias' => $materias];
    }
  //Funcion para guardar materias a la base de datos
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            $materias = new Materias();
            $materias->nombre = $request->nombre; 
            $materias->condicion = '1';      
            $materias->save();
    }
 //Funcion para actualizar las materias
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            $materias = Materias::findOrFail($request->id);
            $materias->nombre = $request->nombre;
            $materias->condicion = '1';      
            $materias->save();
    }
  //Funcion para activar las materias
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $materias = Materias::findOrFail($request->id);
        $materias->condicion = '0';
        $materias->save();
    }
  //Funcion para desactivar las materias
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $materias = Materias::findOrFail($request->id);
        $materias->condicion = '1';
        $materias->save();
    }
}
