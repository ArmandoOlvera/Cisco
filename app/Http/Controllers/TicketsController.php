<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
  
use App\Tickets;
use App\Mensajes;

class TicketsController extends Controller
{
    //
  public function index(Request $request)
    {
    // if (!$request->ajax()) return redirect('/');
      $tickets = Tickets::paginate(2);
  
    #
     $buscar = $request->buscar;
        $criterio = $request->criterio;
          $ide = $request->ide;
        
     /*$tickets = Tickets::join('users','tickets.id_usuario2','=','users.id')
            ->select('tickets.id','tickets.id_usuario1','tickets.id_usuario2','tickets.asunto','tickets.fecha','tickets.nuevo',
                     'tickets.condicion',
                     'users.nombre as nombre_users','users.telefono','users.idrol','users.password','users.email')->
          where('id_usuario2',  $ide)->orWhere('id_usuario1', $ide )->orderBy('fecha', 'desc')->paginate(50);
         */ 
     if ($buscar==''){
    $tickets = DB::table('tickets')
            ->join('users', 'tickets.id_usuario2', '=', 'users.id') 
            ->select('tickets.*', 'users.*')
            ->where('id_usuario2',  $ide)->orWhere('id_usuario1', $ide )->orderBy('fecha', 'desc')->paginate(50);
     }else{
     $tickets = DB::table('tickets')
            ->join('users', 'tickets.id_usuario2', '=', 'users.id') 
            ->select('tickets.*', 'users.*')
            ->where('id_usuario2',  $ide)->where($criterio, 'like', '%'. $buscar . '%')
          ->orWhere('id_usuario1', $ide )->where($criterio, 'like', '%'. $buscar . '%')->orderBy('fecha', 'desc')->paginate(50);
     
     }
       /*
    if ($buscar==''){
           $tickets = Tickets::join('users','tickets.id_usuario2','=','users.id')
            ->select('tickets.id','tickets.id_usuario1','tickets.id_usuario2','tickets.asunto','tickets.fecha','tickets.nuevo',
                     'tickets.condicion',
                     'users.nombre as nombre_users','users.telefono','users.idrol','users.password','users.email')->
          where('id_usuario2',  $ide)->where('condicion', '1')
      ->orWhere('id_usuario1', $ide )->where('condicion', '1')->orderBy('fecha', 'desc')->paginate(50);
         
        }
        else{
        $tickets = Tickets::join('users','tickets.id_usuario2','=','users.id')
            ->select('tickets.id','tickets.id_usuario1','tickets.id_usuario2','tickets.asunto','tickets.fecha','tickets.nuevo',
                     'tickets.condicion',
                     'users.nombre as nombre_users','users.telefono','users.idrol','users.password','users.email')->
          where('id_usuario2',  $ide)->where('condicion', '1')->where($criterio, 'like', '%'. $buscar . '%')
      ->orWhere('id_usuario1', $ide )->where('condicion', '1')->where($criterio, 'like', '%'. $buscar . '%')->orderBy('fecha', 'desc')->paginate(50);
          
            $usuarios = Usuarios::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
    */
    
        return [
            'pagination' => [
            'total'        => $tickets->total(),
                'current_page' => $tickets->currentPage(),
                'per_page'     => $tickets->perPage(),
                'last_page'    => $tickets->lastPage(),
                'from'         => $tickets->firstItem(),
                'to'           => $tickets->lastItem(),
            ],
            'tickets' => $tickets
        ];
    
    }
  
   public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
       DB::update('update tickets set nuevo = ? where id = ?',['0',$request->id]);
     
  //   $ticket = Tickets::findOrFail($request->id);
   // $ticket->nuevo = '0';      
   // $ticket->save();
    }
  
  public function index2(Request $request)
    {
    // if (!$request->ajax()) return redirect('/'); $my_date = date("Y-m-d H:i:s");
      $mensajes = Mensajes::paginate(2);
  
    #  s
    $ide = $request->ide;
     
    $mensajes = Mensajes::where('id_ticket',  $ide)->orderBy('fecha', 'asc')->paginate(100);
          
        return [
            'pagination2' => [
            'total'        => $mensajes->total(),
                'current_page' => $mensajes->currentPage(),
                'per_page'     => $mensajes->perPage(),
                'last_page'    => $mensajes->lastPage(),
                'from'         => $mensajes->firstItem(),
                'to'           => $mensajes->lastItem(),
            ],
            'mensajes' => $mensajes
        ];
    
    }
  
  
  public function index4(Request $request)
    {
    // if (!$request->ajax()) return redirect('/'); $my_date = date("Y-m-d H:i:s");
      $mensajes = Mensajes::paginate(2);
  
    #  s
    $ide = $request->ide;
     
    $mensajes = Mensajes::where('id_ticket',  $ide)->orderBy('fecha', 'asc')->paginate(100);
          
        return [
            'pagination2' => [
            'total'        => $mensajes->total(),
                'current_page' => $mensajes->currentPage(),
                'per_page'     => $mensajes->perPage(),
                'last_page'    => $mensajes->lastPage(),
                'from'         => $mensajes->firstItem(),
                'to'           => $mensajes->lastItem(),
            ],
            'mensajes' => $mensajes
        ];
    
    }
  
  
   public function selectContactos(Request $request){
    // if (!$request->ajax()) return redirect('/');
      $usuarios = Usuarios::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre','asc')->get();
    
    return ['usuarios' => $usuarios];
  }
  
  
   public function store2(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            
     DB::update('update tickets set nuevo = ? where id = ?',['1',$request->id_ticket]);
     
     DB::table('mensajes')->insert(
    ['id_ticket' =>$request->id_ticket, 'mensaje' => $request->mensaje, 'fecha' => date("Y-m-d H:i:s"), 'id_emisor' => $request->id_cuenta]
);
    }
  
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
       $idrol  = $request->idrol; 
      
      if($idrol==1){
         /*   $ticket = new Tickets();
            $ticket->id_usuario1 = $request->id_cuenta;
            $ticket->id_usuario2 = $request->id_receptor;
           
            $ticket->asunto = $request->asunto;
      
            $ticket->fecha = date("Y-m-d");
            $ticket->nuevo = '1';      
            $ticket->condicion = '1';      
            $ticket->save();
        */
        $nomb='';
       $users = DB::table('users')->where('id',$request->id_cuenta)->pluck('nombre');
        
         DB::table('tickets')->insert(
    ['id_usuario1' =>$request->id_cuenta, 'id_usuario2' => $request->id_receptor, 'fecha' => date("Y-m-d H:i:s"),
     'asunto' => $request->asunto, 'nuevo' => '1', 'condicion' => '1', "nombre_admin"=> $users]
);
      }else{
    /*      $ticket = new Tickets();
            $ticket->id_usuario1 = $request->id_receptor;
            $ticket->id_usuario2 = $request->id_cuenta;
           
            $ticket->asunto = $request->asunto;
      
            $ticket->fecha = date("Y-m-d");
            $ticket->nuevo = '1';      
            $ticket->condicion = '1';      
            $ticket->save();*/
         $users = DB::table('users')->where('id',$request->id_receptor)->pluck('nombre');
         
              DB::table('tickets')->insert(
    ['id_usuario1' =>$request->id_receptor, 'id_usuario2' => $request->id_cuenta, 'fecha' => date("Y-m-d H:i:s"),
     'asunto' => $request->asunto, 'nuevo' => '1', 'condicion' => '1',"nombre_admin"=> $users]
);
         
      }
            
    }
 
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
            //Buscar primero el proveedor a modificar
            $persona = Usuarios::findOrFail($request->id);
           $persona->nombre = $request->nombre;
            $persona->idrol = $request->idrol; 
            $persona->email = $request->email;
            $persona->telefono = $request->telefono;
            $persona->usuario = $request->usuario;
      $persona->apellido = $request->apellido;
      $persona->cargo = $request->cargo;
      $persona->pais = $request->pais;
      $persona->extension = $request->extension;
      $persona->idioma = $request->idioma;
      
            $persona->password = bcrypt( $request->password);
            $persona->condicion = '1';      
            $persona->save();
    }
 
  
 
  public function desactivar2(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        //  if (!$request->ajax()) return redirect('/');
       DB::update('update tickets set condicion = ? where id = ?',['0',$request->id]);
    }
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $user = Usuarios::firstOrCreate(['id' => $request->id]); 
        $user->condicion = '1';
        $user->save();
    }
}
