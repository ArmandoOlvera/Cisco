<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
  
  
  
  public function store(Request $request)
    {
            DB::table('grupos')->insert([
    ['nombre' =>$request->nombre, 'descripcion' =>$request->descripcion,'condicion' =>  '1']
]);
    }
  
  
  
  
  public function desactivar(Request $request)
    {
          DB::table('grupos')
            ->where('id', $request->id)
            ->update(['condicion' => '0']);
    }
 
    public function activar(Request $request)
    {
          DB::table('grupos')
            ->where('id', $request->id)
            ->update(['condicion' => '1']);
    }
 
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
          DB::table('grupos')
            ->where('id', $request->id)
            ->update(['nombre' => $request->nombre, 'descripcion' => $request->descripcion]);
    }
}
