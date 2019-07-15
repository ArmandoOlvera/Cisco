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
//Route::group(['middleware'=>['guest']],function(){});


Route::group(['middleware'=>['auth']],function(){
  //un usuario autenticado no puede acceder al login porque pues obvio tiene que desloguearse
  //Route::get('/','Auth\LoginController@showLoginForm');
 
      Route::get('/main', function () {
          return view('contenido/contenido');
      })->name('main');
 
// ESTOS CODIGOS SE 
 // Route::get('/logout','Auth\LoginController@logout')->name('logout');
//Route::post('/logout','Auth\LoginController@logout')->name('logout');
  ///Rutas que solo puede acceder el Administrador
  
  /* POR AHORA ESTAN DESACTIVADAS LAS VALIDACIONES DEL TIPO DE USUARIO, SOLO SE ANALIZA SI ESTAN LOGEADOS O NO
  Route::group(['middleware'=>['Administrador']],function(){
      Route::get('/usuario', 'UsuariosController@index');
      Route::post('/usuario/registrar', 'UsuariosController@store');
      Route::put('/usuario/actualizar', 'UsuariosController@update');
      Route::put('/usuario/desactivar', 'UsuariosController@desactivar');
      Route::put('/usuario/activar', 'UsuariosController@activar');
  });
  //Rutas que solo puede acceder el COntactoPrincipal
  Route::group(['middleware'=>['ContactoPrincipal']],function(){
    
  });*/
  //Poner aqui los enlaces de los usuarios logeados!!
    Route::get('/usuario', 'UsuariosController@index');
    Route::post('/usuario/registrar', 'UsuariosController@store');
      Route::put('/usuario/actualizar', 'UsuariosController@update');
      Route::put('/usuario/desactivar', 'UsuariosController@desactivar');
      Route::put('/usuario/activar', 'UsuariosController@activar');
  
  //SEccion de las academias
  Route::get('/academia', 'AcademiaController@index');
    Route::post('/academia/registrar', 'AcademiaController@store');
      Route::put('/academia/actualizar', 'AcademiaController@update');
      Route::put('/academia/desactivar', 'AcademiaController@desactivar');
      Route::put('/academia/activar', 'AcademiaController@activar');
  
  
  //SEccion de las materias
  Route::get('/materia', 'MateriasController@index');
    Route::post('/materia/registrar', 'MateriasController@store');
      Route::put('/materia/actualizar', 'MateriasController@update');
      Route::put('/materia/desactivar', 'MateriasController@desactivar');
      Route::put('/materia/activar', 'MateriasController@activar');
});

//solo para debugear por ahora, quitar despues
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

