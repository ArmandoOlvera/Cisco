<?php
//eval(base64_decode('CiBnb3RvIHVoQzBiOyB1aEMwYjogUm91dGU6OmdldCgiXDU3IiwgZnVuY3Rpb24gKCkgeyByZXR1cm4gdmlldygiXHg2M1x4NmZceDZlXDE2NFx4NjVceDZlXHg2OVx4NjRcMTU3XHgyZlx4NjNcMTU3XDE1NlwxNjRcMTQ1XHg2ZVwxNTFceDY0XDE1NyIpOyB9KTsgZ290byBFUWxsTjsgRVFsbE46IEF1dGg6OnJvdXRlcygpOyBnb3RvIHZWUXFCOyB2VlFxQjogUm91dGU6OmdldCgiXDU3XDE1MFx4NmZceDZkXDE0NSIsICJceDQ4XDE1N1wxNTVceDY1XDEwM1x4NmZceDZlXDE2NFx4NzJcMTU3XDE1NFx4NmNcMTQ1XHg3MlwxMDBceDY5XDE1Nlx4NjRceDY1XHg3OCIpLT5uYW1lKCJceDY4XDE1N1x4NmRceDY1Iik7IGdvdG8geFpfcUs7IHhaX3FLOiA='));
/*
|--------------------------------------------------------------------------
| Web Routes  http://php-minify.com/php-obfuscator/#
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/
Route::group(['middleware'=>['guest']],function(){
      Route::get('/','Auth\LoginController@showLoginForm');
      Route::post('/login','Auth\LoginController@login')->name('login');
});
Route::group(['middleware'=>['auth']],function(){
  //un usuario autenticado no puede acceder al login porque  tiene que desloguearse
      Route::get('/main', function () {
          return view('contenido/contenido');
      })->name('main'); 
      Route::post('/main', 'MaatwebsiteDemoController@importExcel'); 
  //Poner aqui los enlaces de los usuarios logeados!!  selectContactos
      Route::get('/usuario', 'UsuariosController@index');
      Route::post('/usuario/registrar', 'UsuariosController@store');
      Route::put('/usuario/actualizar', 'UsuariosController@update');
      Route::put('/usuario/desactivar', 'UsuariosController@desactivar');
      Route::put('/usuario/activar', 'UsuariosController@activar');
      Route::get('/usuario/selectUsuarios', 'UsuariosController@selectContactos');
      Route::get('/usuario/selectUsuarios2', 'UsuariosController@selectContactos2');
      Route::get('/usuario/listarUsuarios', 'UsuariosController@listarPDF')->name('usuarios_pdf');
  //SEccion de las academias
      Route::get('/academia', 'AcademiaController@index');
      Route::post('/academia/registrar', 'AcademiaController@store');
      Route::put('/academia/actualizar', 'AcademiaController@update');
      Route::put('/academia/desactivar', 'AcademiaController@desactivar');
      Route::put('/academia/activar', 'AcademiaController@activar');
      Route::get('/academia/selectAcademias', 'AcademiaController@selectAcademias');
      Route::get('/academia/todo', 'AcademiaController@todo');
      Route::get('/academia/listarAcademias', 'AcademiaController@listarPDF')->name('academias_pdf');
  //SEccion de las materias
      Route::get('/materia', 'MateriasController@index');
      Route::post('/materia/registrar', 'MateriasController@store');
      Route::put('/materia/actualizar', 'MateriasController@update');
      Route::put('/materia/desactivar', 'MateriasController@desactivar');
      Route::put('/materia/activar', 'MateriasController@activar');
      Route::get('/materia/todo', 'MateriasController@todo');
      Route::get('/materia/listarMaterias', 'MateriasController@listarPDF')->name('materias_pdf');
  //SEccion de los instructores
      Route::get('/instructor', 'InstructoresController@index');
      Route::post('/instructor/registrar', 'InstructoresController@store');
      Route::put('/instructor/actualizar', 'InstructoresController@update');
      Route::put('/instructor/desactivar', 'InstructoresController@desactivar');
      Route::put('/instructor/activar', 'InstructoresController@activar');
      Route::get('/instructor/todo', 'InstructoresController@todo');
      Route::get('/instructor/listarInstructores', 'InstructoresController@listarPDF')->name('instructores_pdf'); 
  //Seccion para los grupos
      Route::get('/grupos', 'GruposController@index');
      Route::post('/grupos/registrar', 'GruposController@store');
      Route::put('/grupos/desactivar', 'GruposController@desactivar');
      Route::put('/grupos/activar', 'GruposController@activar');
      Route::put('/grupos/actualizar', 'GruposController@update');
      Route::get('/grupos/listarGrupos', 'GruposController@listarPDF')->name('grupos_pdf');
  //Seccion para los grupos por la parte del contacto principal
      Route::get('/grupos2', 'Grupos3Controller@index');
      Route::get('/grupos2/listarGrupos', 'Grupos3Controller@listarPDF')->name('grupos2_pdf');
      Route::get('/academia2', 'Grupos3Controller@obteneracademia'); 
  //Seccion para los historiales de grupos
      Route::get('/historial', 'HistorialController@index');
      Route::post('/historial/registrar', 'HistorialController@store');
      Route::put('/historial/desactivar', 'HistorialController@desactivar');
      Route::put('/historial/activar', 'HistorialController@activar');
      Route::put('/historial/actualizar', 'HistorialController@update'); 
  //SEccion de los tickets de mensajes admin-contacto_principal
      Route::get('/ticket', 'TicketsController@index');
      Route::get('/ticket/getMensaje', 'TicketsController@index2');
      Route::get('/ticket/getMensaje2', 'TicketsController@index3');
      Route::post('/ticket/registrar', 'TicketsController@store');
      Route::post('/ticket/registrarMensaje', 'TicketsController@store2');
      Route::put('/ticket/actualizar', 'TicketsController@update');
      Route::put('/ticket/desactivar', 'TicketsController@desactivar');
      Route::put('/ticket/desactivar2', 'TicketsController@desactivar2');
      Route::put('/ticket/activar', 'TicketsController@activar'); 
  //Dashboard general
      Route::get('/dashboard', 'DashboardController');  
}); 
//Listado de rutas de login para acceso global
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/','Auth\LoginController@showLoginForm'); 
Route::post('/login','Auth\LoginController@login')->name('login'); 