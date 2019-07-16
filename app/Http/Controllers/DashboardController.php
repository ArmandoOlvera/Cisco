<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function __invoke(Request $request)
    {
        $anio=date('Y');
        $usuarios=DB::table('users as i')
        ->select(DB::raw('MONTH(i.created_at) as mes'),
        DB::raw('YEAR(i.created_at) as anio'),
        DB::raw('COUNT(*) as total'))
        ->whereYear('i.created_at',$anio)
        ->groupBy(DB::raw('MONTH(i.created_at)'),DB::raw('YEAR(i.created_at)'))
        ->orderBy('mes', 'desc')
        ->get();
     
        $anio2=1;
        $usuarios2=DB::table('users as i')
        ->select(DB::raw('COUNT(*) as activos')) 
           ->where('i.condicion',$anio2)
        ->orderBy('created_at', 'desc')
        ->get();
 
        return ['ingreso'=>$usuarios,'anio'=>$anio,'usuarios'=>$usuarios2];      
 
    }
}
