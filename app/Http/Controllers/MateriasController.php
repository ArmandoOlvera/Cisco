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
    // if (!$request->ajax()) return redirect('/');
      $materias = Materias::paginate(2);
  
    #
     $buscar = $request->buscar;
        $criterio = $request->criterio;
         
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
  
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            $materias = new Materias();
            $materias->nombre = $request->nombre;
          
            $materias->condicion = '1';      
            $materias->save();
    }
 
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            //Buscar primero el proveedor a modificar
            $materias = Materias::findOrFail($request->id);
           $materias->nombre = $request->nombre;
       
            $materias->condicion = '1';      
            $materias->save();
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $materias = Materias::findOrFail($request->id);
        $materias->condicion = '0';
        $materias->save();
    }
 
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $materias = Materias::findOrFail($request->id);
        $materias->condicion = '1';
        $materias->save();
    }
}
