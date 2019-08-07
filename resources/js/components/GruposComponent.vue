<template> 
<div class="app-main__outer"> 
     <div class="jvectormap-tip"></div>   
                    <div class="app-main__inner">
                       <!---AQUI VA EL TITULO DE LA PAGINA----> 
                       <div class="app-page-title">
                 
  
                            <div class="page-title-wrapper">
                              
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Pantalla de Grupos 
                                      
                                        <div class="page-title-subheading">Bienvenido
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                  <!---AQUI VA EL CONTENIDO PRINCIPAL---->                
                  <div class="row">
                    <div class="col-lg-12">
                 
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Tabla de Grupos</h5>
                                      
                                      

<!-- Button trigger modal -->
<button type="button" @click="abrirModal('usuario','registrar')" class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dimiss="modal"  data-backdrop="false">
 Nuevo
  <span class="badge badge-light">GRUPO</span>
</button>
                     
                                      <!--------------BARRA DE BUSQUEDA----------------->
                                      <br>
                                       <div class="col-lg-12">
                                           <!--------SEccion del selector de elementos de busqueda---------->
                                         <div class="col-mb-4">
                                           <label><span>Buscar por:</span></label>
                                         <select    class="  btn btn-focus"   v-model="criterio">
                                                <option    class="dropdown-item">nombre</option>
                                                <option    class="dropdown-item">descripcion</option> 
                                            </select>
                                            </div>
                                          <!------------------>
                                         <br>
                                          <div class="col-mb-8" style="position: relative;">
                                        <div class="search-wrapper active">
                                          <div class="input-holder">
                                            <input type="text" v-model="buscar" @keyup.enter="listarGrupos(1,buscar,criterio)" placeholder="Escriba para buscar registros" class="search-input">
                                            <button  type="submit" class="search-icon" @click="listarGrupos(1,buscar,criterio)">
                                              <span>
                                              </span>
                                            </button>
                                          </div>  
                                         </div>
                                          </div>
                                         </div>
                                      <br>
                                      <!------------------------------->
                                      
                                      
                                      <div class="table-responsive">
                                            <table class="mb-0 table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Herramientas</th>
                                                  <th>Nombre</th>
                                                  <th>Descripción</th>
                                                    <th>Condición</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for=" usuario in arrayGrupos" :key="usuario.id">
                                                     <th scope="row">
                                                       <template v-if="usuario.condicion">
                                      <button type="button" class="mb-2 mr-2 btn btn-success"  @click="desactivarGrupo(usuario.id)"><i class="pe-7s-sun"> </i>Desactivar </button> 
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
 <button type="button" class="mb-2 mr-2 btn btn-danger"  @click="activarGrupo(usuario.id)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i>Activar</button>
                                            
                                        </template>
                                                                      <button type="button" @click="cargarPDF(usuario.id)" class="mb-2 mr-2 btn btn-primary"   >
 Nuevo
  <span class="badge badge-light">REPORTE</span>
</button>
                                                      <button type="button" class="mb-2 mr-2 btn btn-warning" @click="abrirModal('usuario','actualizar', usuario)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square"></i>Modificar</button>
                                                      <button type="button" class="mb-2 mr-2 btn btn-warning" @click="abrirModal('usuario','historial', usuario)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square"></i>Instructores</button>
                                                    </th>
                                                  <td v-text="usuario.nombre"> </td>
                                                  <td v-text="usuario.descripcion"> </td>
                                                   <!----  <td v-text="usuario.password"> </td>---->
                                                   <td  >
                                                   <div v-if="usuario.condicion == 1">
                                                        <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-success">Activo</a>
                                                        </div>
                                                        <div v-else>
                                                         <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-danger">Inactivo</a>
                                                        </div>
                                                      </td>
                                                </tr> 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  <!--BARRA DE INDEXS-->
                                 
                                  <hr  > 
                                 <div class="card-body"><h5 class="card-title">Otros resultados</h5>
                                        <nav class="" aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item" v-if="pagination.current_page >1">
                                                  <a href="#" class="page-link" @click="cambiarPagina(pagination.current_page-1,buscar,criterio)" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Anteriors</span></a>
                                              </li>
                                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                                  <a href="#" class="page-link" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                              </li>
                                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                                  <a href="#" @click="cambiarPagina(pagination.current_page+1,buscar,criterio)" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Siguiente</span></a>
                                              </li>
                                            </ul>
                                        </nav>
                                    </div>
                                   
                      </div>
                     
                            </div>
                    
<!-------AQUI INICIA EL MODAL-----------><!-------AQUI INICIA EL MODAL-----------><!-------AQUI INICIA EL MODAL----------->
  <div class="modal fade bd-example-modal-lg" :class="{'mostrar' : modal}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="padding: 80px;display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
          <form class="needs-validation was-validated" novalidate=""> 
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" v-text="tituloModal"></h5>
                <button type="button" class="close"  @click="cerrarModal()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
           
                    <div class="modal-body" v-if="tipoAccion<3">
                        <div class="form-row">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom02">Nombre </label>
                                            <input type="text" class="form-control" id="nombre" v-model="nombre" placeholder="Ej: Machucho Hiram"  required="">
                                            <div class="valid-feedback">
                                               Buen nombre!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese un nombre.
                                            </div>
                                        </div>
                                        
                                    </div>
                      </div>
                      
                       
                          <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom02">Descripción </label>
                                            <input type="text" class="form-control" id="descripcion" v-model="descripcion" placeholder="Ej: Este es el grupo de las 5"  required="">
                                            <div class="valid-feedback">
                                               Buena descripción!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese una descripción del grupo.
                                            </div>
                                        </div>
                                        
                                    </div>
                       
                      
                    </div>
                    <div class="modal-body" v-if="tipoAccion==3">
                          <div class="col-lg-12">

                          <div class="main-card mb-3 card">
                          <div class="card-body"><h5 class="card-title">Tabla de Inscritos</h5>



                          <!-- Button trigger modal -->
                          <button type="button" @click="abrirModal('usuario','nins')" class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dimiss="modal"  data-backdrop="false">
                          Nuevo
                          <span class="badge badge-light">INSTRUCTOR</span>
                          </button>
                          <!--------------BARRA DE BUSQUEDA----------------->
                          <br>
                          <div class="col-lg-12">
                          <!--------SEccion del selector de elementos de busqueda---------->
                          <div class="col-mb-4">
                          <label><span>Buscar por:</span></label>
                          <select    class="  btn btn-focus"   v-model="criterio">
                          <option    class="dropdown-item">nombre</option>
                          <option    class="dropdown-item">status</option> 
                          </select>
                          </div>
                          <!------------------>
                          <br>
                          <div class="col-mb-8" style="position: relative;">
                          <div class="search-wrapper active">
                          <div class="input-holder">
                          <input type="text" v-model="buscar" @keyup.enter="listarGrupos(1,buscar,criterio)" placeholder="Escriba para buscar registros" class="search-input">
                          <button  type="submit" class="search-icon" @click="listarGrupos(1,buscar,criterio)">
                          <span>
                          </span>
                          </button>
                          </div>  
                          </div>
                          </div>
                          </div>
                          <br>
                          <!------------------------------->


                          <div class="table-responsive">
                          <table class="mb-0 table table-hover">
                          <thead>
                          <tr>
                          <th>Herramientas</th>
                          <th>Instructor</th>
                          <th>Academia</th>
                          <th>Status</th>
                          <th>Inicio</th>
                          <th>Materia</th>
                          <th>OC</th>
                          <th>Horario</th>
                          <th>Condición</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr v-for=" instructor in arrayInstructor" :key="instructor.id">
                          <td scope="row">
                          <template v-if="instructor.condicion">
                          <button type="button" class="mb-2 mr-2 btn btn-success"  @click="desactivarInstructor(instructor.id)"><i class="pe-7s-sun"> </i>Desactivar </button> 
                          <i class="icon-trash"></i>
                          </button>
                          </template>
                          <template v-else>
                          <button type="button" class="mb-2 mr-2 btn btn-danger"  @click="activarInstructor(instructor.id)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i>Activar</button>

                          </template>

                          <button type="button" class="mb-2 mr-2 btn btn-warning" @click="abrirModal('usuario','eins', instructor)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square"></i>Modificar</button>
                          </td>
                            
                            
                            
                          <td v-text="instructor.nombre_users"> </td>
                          <td v-text="instructor.nombre_academias"> </td>
                          <td v-text="instructor.status"> </td>
                            <td v-text="instructor.fecha_inicio"> </td>
                            <td v-text="instructor.nombre_materias"> </td>
                            <td v-text="instructor.fecha_oc"></td>
                            <td v-text="instructor.hora_preferida"> </td>
                          <!----  <td v-text="usuario.password"> </td>---->
                          <td  >
                          <div v-if="instructor.condicion == 1">
                          <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-success">Activo</a>
                          </div>
                          <div v-else>
                          <a href="javascript:void(0);" class="mb-2 mr-2 badge badge-danger">Inactivo</a>
                          </div>
                            
                            
                            
                          </td>
                          </tr> 
                          </tbody>
                          </table>
                          </div>
                          </div>
                          <!--BARRA DE INDEXS-->

                          <hr  > 
                          <div class="card-body"><h5 class="card-title">Otros resultados</h5>
                          <nav class="" aria-label="Page navigation example">
                          <ul class="pagination">
                          <li class="page-item" v-if="pagination.current_page >1">
                          <a href="#" class="page-link" @click="cambiarPagina(pagination.current_page-1,buscar,criterio)" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Anteriors</span></a>
                          </li>
                          <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                          <a href="#" class="page-link" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                          </li>
                          <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                          <a href="#" @click="cambiarPagina(pagination.current_page+1,buscar,criterio)" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Siguiente</span></a>
                          </li>
                          </ul>
                          </nav>
                          </div>

                          </div>

                          </div>
                    </div>
            
                    <div class="modal-body" v-if="tipoAccion==4">
                            <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                            <label for="rol" class="">Academia</label>
                            <template>
                            <select v-model="id_academia"  class="form-control">
                            <option value="0" :selected="true" >Selecciona una academia</option>
                            <option v-for="option in arrayAcademias" v-bind:value="option.id">
                            {{ option.nombre }}
                            </option>
                            </select> 
                            </template>
                            <!------- <div class="valid-feedback">
                            Correcto!
                            </div>
                            <div class="invalid-feedback">
                            Porfavor ingrese un rol.
                            </div>----->
                            </div>
                            <div class="col-md-4 mb-3">
                            <label for="rol" class="">Instructor</label>
                            <template>
                            <select v-model="id_instructor"  class="form-control">
                            <option value="0" :selected="true" >Selecciona un Instructor</option>
                            <option v-for="option in arrayInstructores" v-bind:value="option.id">
                            {{ option.nombre }}
                            </option>
                            </select> 
                            </template>
                            </div>

                            <div class="col-md-4 mb-3">
                            <label for="rol" class="">Status</label>
                            <template>
                            <select v-model="status"  class="form-control"> 
                            <option value="Aprobado"  :selected="true" >Aprobado</option>
                            <option value="Reprobado"   >Reprobado</option>
                            <option value="Espera"   >Espera</option>

                            </select> 
                            </template> 
                            </div>

                            </div>
                      
                      
                            <div class="form-row">
                                  <div class="col-md-4 mb-3">
                                  <label for="validationCustom02">Fecha inicial </label>
                                  <input type="date" class="form-control" id="fecha" v-model="fecha_inicio" placeholder="1998-03-27"  required="">
                                  <div class="valid-feedback">
                                  Buen fecha!
                                  </div>
                                  <div class="invalid-feedback">
                                  Porfavor ingrese una fecha valida.
                                  </div>
                                  </div>
                              
                                  <div class="col-md-4 mb-3">
                                  <label for="rol" class="">Materia</label>
                                  <template>
                                  <select v-model="id_materia"  class="form-control">
                                  <option value="0" :selected="true" >Selecciona una materia</option>
                                  <option v-for="option in arrayMaterias" v-bind:value="option.id">
                                  {{ option.nombre }}
                                  </option>
                                  </select> 
                                  </template>
                                  </div>
                              
                                  <div class="col-md-4 mb-3">
                                  <label for="validationCustom02">Curso de Orientación </label>
                                  <input type="date" class="form-control" id="oc" v-model="fecha_oc" placeholder="1998-03-27"  required="">
                                  <div class="valid-feedback">
                                  Buen fecha!
                                  </div>
                                  <div class="invalid-feedback">
                                  Porfavor ingrese una fecha valida.
                                  </div>
                                  </div>
                            </div>
                      
                      
                            <div class="form-row">
                                  <div class="col-md-4 mb-3">
                                  <label for="rol" class="">Hora preferida</label>
                                  <template>
                                  <select v-model="hora_preferida"  class="form-control"> 
                                  <option value="11:00"  :selected="true" >11:00</option>
                                  <option value="17:00"   >17:00</option>

                                  </select> 
                                  </template> 
                                  </div>
                            </div>

                    </div>
                   <div class="form-row" v-if="seen"> 
                          <div class="alert alert-danger" role="alert" >
                            No se ha guardado el registro, esto puede ser causado por:
                            <br>*No se ingresaron todos los datos correctamente
                          </div>
                      </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  @click="cerrarModal()" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" v-if="tipoAccion2==41" @click="registrarInstructor()" >Guardar I</button>
              <button type="button" class="btn btn-primary" v-if="tipoAccion2==42" @click="actualizarInstructor()" >Actualizar I</button>
               <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarGrupo()" >Guardar G</button>
              <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarGrupo()" >Actualizar G</button>
            </div>
          
          
           </form>
        </div>
    </div>
</div>
                    <!-------AQUI TERMINA EL MODAL----------->
                  </div>                      
  <!----Aqui termina la seccion principal de la pagina---->
   
 
                    </div>
 
                 
</div>


</template>

<script>
  export default {
    data() {
      return {
         selected: '1',
    options: [
      { text: 'Administrador', value: '1' },
      { text: 'Contacto Principal', value: '2' },
      
    ],
        nombre: '',
        descripcion: '',
        condicion: 0,
        seen:false,
        id_academia:'',
        id_instructor:'',
        status:'',
        fecha_inicio:'',
        id_materia:'',
        fecha_oc:'',
        condicion:1,
        hora_preferida:'',
        id_grupo:'',
        
        idUP:'',
    
        arrayGrupos: [],
        arrayInstructor: [],
        arrayAcademias:[],
        arrayInstructores:[],
        arrayMaterias:[],
        
        modal:0,
        tituloModal:'',
        tipoAccion:0,
        tipoAccion2:0,
        usuario_id:0,
        paginationR : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
        pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
        last : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
        criterio:'nombre',
        buscar: '',
      }
    },
     computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
    
    methods: {
      listarGrupos(page,buscar,criterio) {
        let me = this;
        var url= '/grupos?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
        axios.get(url).then(function(response) {
            var respuesta= response.data;
            me.arrayGrupos = respuesta.grupos.data;
            me.pagination= respuesta.pagination;
          me.seen=false;
        })
        .catch(function(error) {
            // handle error
          me.seen=true;
            console.log(error);
        });
      },
      
      listarInstructor(page,buscar,criterio) {
        let me = this;
        var url= '/historial?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
        axios.get(url).then(function(response) {
            var respuesta= response.data;
            me.arrayInstructor = respuesta.historial.data; 
            me.pagination= respuesta.pagination;
        })
        .catch(function(error) {
            // handle error
            console.log(error);
        });
      },
      
      listarInstructores() {
        let me = this;
        var url= '/instructor/todo';
        axios.get(url).then(function(response) {
            var respuesta= response.data;
            me.arrayInstructores = respuesta.instructores.data;
        })
        .catch(function(error) {
            console.log(error);
        });
      },
      
      listarMaterias() {
        let me = this;
        var url= '/materia/todo';
        axios.get(url).then(function(response) {
            var respuesta= response.data;
            me.arrayMaterias = respuesta.materias.data;
        })
        .catch(function(error) {
            console.log(error);
        });
        
      },
      
      listarAcademias() {
        let me = this;
        var url= '/academia/todo';
        axios.get(url).then(function(response) {
            var respuesta= response.data;
            me.arrayAcademias = respuesta.academia.data;
        })
        .catch(function(error) {
            console.log(error);
        });
      },
      
      desactivarGrupo(id){
         const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
           },
           buttonsStyling: false,
         })

        swalWithBootstrapButtons.fire({
            title: 'Estas seguro de desactivar el grupo?',
            text: "Puedes volver a activarlo despuès",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
  
        if (result.value) {
            let me = this;
            axios.put('/grupos/desactivar',{
                'id': id
            }).then(function (response) {
                me.listarGrupos(1,'','nombre');
                swal(
                'Activado!',
                'El registro ha sido activado con éxito.',
                'success'
                )
            }).catch(function (error) {
                console.log(error);
            });
            swalWithBootstrapButtons.fire(
                'Desactivado!',
                'El grupo ha sido desactivado.',
                'success'
            )
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
        swalWithBootstrapButtons.fire(
            'Cancelado!',
            'No se ha realizado ningun cambio',
            'error'
        )
        }
        })
      },
        cargarPDF(id){
        window.open('http://goldenwind.me/grupos/listarGrupos?id='+id,'_blank');
      }
      ,
      desactivarInstructor(id){
         const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
           },
           buttonsStyling: false,
         })

        swalWithBootstrapButtons.fire({
            title: 'Estas seguro de desactivar al instructor?',
            text: "Puedes volver a activarlo despuès",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
  
        if (result.value) {
            let me = this;
            axios.put('/historial/desactivar',{
                'id': id
            }).then(function (response) {
                me.listarInstructor(1,me.id_grupo,'id_grupo');
                swal(
                'Activado!',
                'El registro ha sido activado con éxito.',
                'success'
                )
            }).catch(function (error) {
                console.log(error);
            });
            swalWithBootstrapButtons.fire(
                'Desactivado!',
                'El Instructor ha sido desactivado.',
                'success'
            )
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
        swalWithBootstrapButtons.fire(
            'Cancelado!',
            'No se ha realizado ningun cambio',
            'error'
        )
        }
        })
      },
      
      activarGrupo(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false,
          })

          swalWithBootstrapButtons.fire({
              title: 'Estas seguro de acttivar el grupo?',
              text: "Puedes cambiar esto después",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'No, cancelar!',
              reverseButtons: true
          }).then((result) => {

          if (result.value) {
              let me = this;
              axios.put('/grupos/activar',{
                  'id': id
              }).then(function (response) {
                  me.listarGrupos(1,'','nombre');
                  swal(
                  'Activado!',
                  'El registro ha sido activado con éxito.',
                  'success'
                  )
              }).catch(function (error) {
                  console.log(error);
              });
              swalWithBootstrapButtons.fire(
                  'Activado!',
                  'El grupo ha sido activado.',
                  'success'
              )
              } else if (
                  // Read more about handling dismissals
                  result.dismiss === Swal.DismissReason.cancel
              ) {
              swalWithBootstrapButtons.fire(
                  'Cancelado',
                  'No se ha realizado ningun cambio',
                  'error'
              )
              }
          })
      },
      
      activarInstructor(id){
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false,
          })

          swalWithBootstrapButtons.fire({
              title: 'Estas seguro de activar el Instructor?',
              text: "Puedes cambiar esto después",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Aceptar!',
              cancelButtonText: 'No, cancelar!',
              reverseButtons: true
          }).then((result) => {

          if (result.value) {
              let me = this;
              axios.put('/historial/activar',{
                  'id': id
              }).then(function (response) {
                  me.listarInstructor(1,me.id_grupo,'id_grupo');
                  swal(
                  'Activado!',
                  'El registro ha sido activado con éxito.',
                  'success'
                  )
              }).catch(function (error) {
                  console.log(error);
              });
              swalWithBootstrapButtons.fire(
                  'Activado!',
                  'El Instructor ha sido activado.',
                  'success'
              )
              } else if (
                  // Read more about handling dismissals
                  result.dismiss === Swal.DismissReason.cancel
              ) {
              swalWithBootstrapButtons.fire(
                  'Cancelado',
                  'No se ha realizado ningun cambio',
                  'error'
              )
              }
          })
      },
      
      actualizarGrupo(){
          let me = this;
          console.log(this.nombre);
          axios.put('/grupos/actualizar',{
              'id': this.idUP,
              'nombre': this.nombre,
              'descripcion': this.descripcion,
          }).then(function (response) {
              me.cerrarModal();
            me.seen=false;
              me.listarGrupos(1,'','nombre');
          }).catch(function (error) {
              console.log(error);
            me.seen=true;
          }); 
      },
      
      actualizarInstructor(){
          let me = this;
          console.log(this.nombre);
          axios.put('/historial/actualizar',{
              'id': this.idUP,
              'id_academia': me.id_academia,
              'id_instructor': me.id_instructor,
              'status': me.status,
              'fecha_inicio': me.fecha_inicio,
              'id_materia': me.id_materia,
              'fecha_oc': me.fecha_oc,
              'hora_preferida': me.hora_preferida,
              'id_grupo': me.id_grupo,
          }).then(function (response) {
              me.cerrarModal();
              me.listarInstructor(1,me.id_grupo,'id_grupo');
          }).catch(function (error) {
              console.log(error);
          });
      },
      
      cambiarPagina(page,buscar,criterio){
            let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarGrupos(page,buscar,criterio);
      },

      registrarGrupo(){
                let me = this;
         console.log( me.nombre);
         console.log(me.descripcion);
                axios.post('/grupos/registrar',{
                    'nombre': me.nombre,
                    'descripcion': me.descripcion,
                }).then(function (response) {
                    me.cerrarModal();
                  me.seen=false;
                    me.listarGrupos(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                  me.seen=true;
                });
      },
      
      registrarInstructor(){
        
          let me = this;
          axios.post('/historial/registrar',{
              'id_academia': me.id_academia,
              'id_instructor': me.id_instructor,
              'status': me.status,
              'fecha_inicio': me.fecha_inicio,
              'id_materia': me.id_materia,
              'fecha_oc': me.fecha_oc,
              'hora_preferida': me.hora_preferida,
              'id_grupo': me.id_grupo,
          }).then(function (response) {
              me.cerrarModal();
            me.seen=false;
              me.listarInstructor(1,me.id_grupo,'id_grupo');
          }).catch(function (error) {
              console.log(error);
            me.seen=true;
          });
      },
      
      cerrarModal(){
                    this.seen=false;
            if(this.tipoAccion==4){
                this.modal=1;
                this.tituloModal='Incritos';
                this.tipoAccion=3;
                this.tipoAccion2=0;
            }
            else{
                this.modal=0;
                this.tituloModal='';

                this.nombre='';
                this.descripcion='';

                //this.listarGrupos(1,this.buscar,this.criterio);
                this.pagination = this.paginationR; 
              this.tipoAccion2=0;
            }
      },
      abrirModal(modelo, accion, data = []) {
        switch (modelo) {
          case "usuario": {
             switch(accion){
                case 'registrar':{
                    this.nombre='';
                    this.descripcion='';
                  this.seen=false;
                    this.tipoAccion = 1;
                    this.modal=1;
                    this.tituloModal='Registrar Grupo';
                    break;
                }
                case 'actualizar':{
                    console.log(data['nombre']);
                    this.modal=1;
                    this.tituloModal='Actualizar Grupo';
                    this.tipoAccion=2;
                  this.seen=false;
                    this.idUP= data['id'];
                  
                    this.nombre=data['nombre'];
                    this.descripcion=data['descripcion'];  
                    break;
                } 
                case 'historial':{
                    this.paginationR=this.pagination;
                    this.listarInstructor(1,data['id'],'id_grupo');
                    console.log(data['id']);
                    this.modal=1;
                    this.tituloModal='Incritos';
                    this.tipoAccion=3;
                    this.id_grupo = data['id'];
                    this.idUP= data['id'];
                    console.log(this.id_grupo);
                    break;
                } 
                case 'nins':{
                  
                    this.id_academia='';
                    this.id_instructor='';
                    this.status='';
                    this.fecha_inicio='';
                    this.id_materia='';
                    this.fecha_oc='';
                    this.hora_preferida='';
                  
                    this.tipoAccion2=41;
                    this.listarInstructores();
                    this.listarMaterias();
                    this.listarAcademias();
                    console.log(data['id']);
                    this.modal=1;
                    this.tituloModal='Nuevo Instructor';
                    this.tipoAccion=4;
                  
                    this.idUP= data['id'];  
                    break;
                }
                case 'eins':{
                  
                    this.id_academia=data['id_academia'];
                    this.id_instructor=data['id_instructor'];
                    this.status=data['status'];
                    this.fecha_inicio=data['fecha_inicio'];
                    this.id_materia=data['id_materia'];
                    this.fecha_oc=data['fecha_oc'];
                    this.hora_preferida=data['hora_preferida'];
                    this.id_grupo=data['id_grupo'];
                  
                    this.tipoAccion2=42;
                    this.listarInstructores();
                    this.listarMaterias();
                    this.listarAcademias();
                    console.log(data['id']);
                    this.modal=1;
                    this.tituloModal='Nuevo Instructor';
                    this.tipoAccion=4;
                  
                    this.idUP= data['id'];  
                    break;
                } 
            }
          }
        }
      }
    },
    mounted() {
      this.listarGrupos(1,this.buscar,this.criterio);
      
      var id = document.getElementById("id").value;
      var nombre = document.getElementById("nombre").value;
      console.log('Component mounted, el usuario es ' + nombre + " con el id " + id);
    }
  }
</script>

<style>
  .modal-content{
    width: 100% !important;
    position: absolute !important;
  }
  .mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #3c292297a !important;
  }
  
</style>