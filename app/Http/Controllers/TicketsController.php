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
      //sentencia para manejar los criterios de busqueda para los tickets
      $tickets = Tickets::paginate(2);
      $buscar = $request->buscar;
      $criterio = $request->criterio;
      $ide = $request->ide;
      //sentencia para manejar las busquedas de los tickets por criterios y sin ellos 
     if ($buscar==''){
    $tickets = DB::table('tickets')
            ->join('users', 'tickets.id_usuario2', '=', 'users.id') 
            ->select('tickets.id as ticketid','tickets.*', 'users.*')
            ->where('id_usuario2',  $ide)->orWhere('id_usuario1', $ide )->orderBy('fecha', 'desc')->paginate(50);
     }else{
     $tickets = DB::table('tickets')
            ->join('users', 'tickets.id_usuario2', '=', 'users.id') 
            ->select('tickets.id as ticketid','tickets.*', 'users.*')
            ->where('id_usuario2',  $ide)->where($criterio, 'like', '%'. $buscar . '%')
          ->orWhere('id_usuario1', $ide )->where($criterio, 'like', '%'. $buscar . '%')->orderBy('fecha', 'desc')->paginate(50);
     
     }

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
  //Funcion para desactivar los tickets
   public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
       DB::update('update tickets set nuevo = ? where id = ?',['0',$request->id]);
    }
  //Funcion para obtener los mensajes de algun ticekt segun sea el caso
  public function index2(Request $request)
    { 
    $mensajes = Mensajes::paginate(2);
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
  
  //Funcion para obtener los mensajes de algun ticekt segun sea el caso
  public function index4(Request $request)
    { 
    $mensajes = Mensajes::paginate(2); 
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
  
  //Funcion para obtener los contactos principales de los usuarios
   public function selectContactos(Request $request){ 
    $usuarios = Usuarios::where('condicion','=','1')->select('id','nombre')->orderBy('nombre','asc')->get();
    return ['usuarios' => $usuarios];
  }
  
  //Funcion para guardar un mensaje de un ticket
   public function store2(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      DB::table('mensajes')->insert(   ['id_ticket' =>$request->id_ticket, 'mensaje' => $request->mensaje, 'fecha' => date("Y-m-d H:i:s"), 'id_emisor' => $request->id_cuenta]
);
    }
  //Funcion para guardar un ticket dependiendo si lo creo un administrador  o un contacto principal
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
       $idrol  = $request->idrol; 
      if($idrol==1){
       $nomb='';
       $users = DB::table('users')->where('id',$request->id_cuenta)->pluck('nombre');
        
         DB::table('tickets')->insert(
    ['id_usuario1' =>$request->id_cuenta, 'id_usuario2' => $request->id_receptor, 'fecha' => date("Y-m-d H:i:s"),
     'asunto' => $request->asunto, 'nuevo' => '1', 'condicion' => '1', "nombre_admin"=> $users]
);
      }else{ 
       $users = DB::table('users')->where('id',$request->id_receptor)->pluck('nombre');
       DB::table('tickets')->insert(
    ['id_usuario1' =>$request->id_receptor, 'id_usuario2' => $request->id_cuenta, 'fecha' => date("Y-m-d H:i:s"),
     'asunto' => $request->asunto, 'nuevo' => '1', 'condicion' => '1',"nombre_admin"=> $users]
);  
      }
    }
 //Funcion para actualizær
    public function update(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
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
 
  
 //FUncion paa desactivar un ticket
  public function desactivar2(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
       DB::update('update tickets set condicion = ? where id = ?',['0',$request->id]);
    }
  //Funcion par activar un ticket
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $user = Usuarios::firstOrCreate(['id' => $request->id]); 
        $user->condicion = '1';
        $user->save();
    }
}
