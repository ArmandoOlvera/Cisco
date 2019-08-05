<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function __invoke(Request $request)
    {
     //sentencias que hacen las busquedas para la pagina principal del lado del administrador
        $anio=date('Y');
        $usuarios=DB::table('users as i')
        ->select(DB::raw('MONTH(i.created_at) as mes'),
        DB::raw('YEAR(i.created_at) as anio'),
        DB::raw('COUNT(*) as total'))
        ->whereYear('i.created_at',$anio)
        ->groupBy(DB::raw('MONTH(i.created_at)'),DB::raw('YEAR(i.created_at)'))
        ->orderBy('mes', 'desc')
        ->get();
     //De aqui se obtienen los usuarios activos para la pantalla principal
        $anio2=1;
        $usuarios2=DB::table('users as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.condicion',$anio2)
        ->orderBy('created_at', 'desc')
        ->get();
     
     //De aqui se obtienen los grupos activos para la pantalla principal
     $anio2=1;
        $grupo=DB::table('grupos as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.condicion',$anio2)
        ->orderBy('id', 'desc')
        ->get();
     
     //De aqui se obtienen las academias activos para la pantalla principal
      $anio2=1;
        $academia=DB::table('academia as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.condicion',$anio2)
        ->orderBy('id', 'desc')
        ->get();
     
     //De aqui se obtienen los instructores activos para la pantalla principal
     $anio2=1;
        $instructor=DB::table('instructor as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.condicion',$anio2)
        ->orderBy('id', 'desc')
        ->get();
     
     //De aqui se obtienen los resultados de los alumnos aprobados para la pantalla principal
     $anio2=1;
        $aprobados=DB::table('historial as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.status',"Aprobado")
        ->orderBy('id', 'desc')
        ->get();
     
     //De aqui se obtienen los resultados de los alumnos reprobados para la pantalla principal
      $reprobados=DB::table('historial as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.status',"Reprobado")
        ->orderBy('id', 'desc')
        ->get();
 
     //De aqui se obtienen los usuarios administradores activos para la pantalla principal
     $admin=DB::table('users as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.idrol',1)
        ->orderBy('created_at', 'desc')
        ->get();
     
   
        return ['ingreso'=>$usuarios,'anio'=>$anio,'usuarios'=>$usuarios2,'grupo'=>$grupo,
                'academia'=>$academia,'instructor'=>$instructor,'aprobados'=>$aprobados,'reprobados'=>$reprobados,
               'admin'=>$admin];      
 
    }
}
