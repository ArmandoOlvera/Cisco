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
                                    <div>Pantalla de Instructores 
                                      
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
                                    <div class="card-body"><h5 class="card-title">Tabla de Instructores</h5>
                                      
                                      

<!-- Button trigger modal -->
<button type="button" @click="abrirModal('instructor','registrar')" class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dimiss="modal"  data-backdrop="false">
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
                                                <option    class="dropdown-item">telefono</option> 
                                            </select>
                                            </div>
                                          <!------------------>
                                         <br>
                                          <div class="col-mb-8" style="position: relative;">
                                        <div class="search-wrapper active">
                                          <div class="input-holder">
                                            <input type="text" v-model="buscar" @keyup.enter="listarInstructores(1,buscar,criterio)" placeholder="Escriba para buscar registros" class="search-input">
                                            <button  type="submit" class="search-icon" @click="listarInstructores(1,buscar,criterio)">
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
                                                     <th>Academia</th>
                                                    <th>Nombre</th>
                                                  <th>Apellidos</th>
                                                    <th>Telefono</th> 
                                                    <th>Email</th> 
                                                   <!----- <th>Contraseña</th>--->
                                                    <th>Condición</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for=" instructor in arrayInstructor" :key="instructor.id">
                                                     <th scope="row">
                                                       <template v-if="instructor.condicion">
                                      <button type="button" class="mb-2 mr-2 btn btn-success"  @click="desactivarInstructor(instructor.id)"><i class="pe-7s-sun"> </i>Desactivar </button> 
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
 <button type="button" class="mb-2 mr-2 btn btn-danger"  @click="activarInstructor(instructor.id)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i>Activar</button>
                                            
                                        </template>
                                                     
                                                      <button type="button" class="mb-2 mr-2 btn btn-warning" @click="abrirModal('instructor','actualizar', instructor)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square"></i>Modificar</button>
                                                    </th>
                                                    <td v-text="instructor.nombre_academia"> </td>
                                                  <td v-text="instructor.nombre"> </td>
                        <td v-text="instructor.apellido"> </td>
                                                    <td v-text="instructor.telefono"> </td> 
                                                     <td v-text="instructor.email"> </td>
 
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
           
                    <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3"> 
                                            <label for="rol" class="">Academia</label>
                                          <template>
                                           <select v-model="id_academia"  class="form-control">
                                              <option value="0" :selected="true" >Selecciona una opción</option>
                                                <option v-for="acaedmia in arrayAcademias" v-bind:value="acaedmia.id"  v-text="acaedmia.nombre">
                                                 
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
                                            <label for="validationCustom02">Nombre </label>
                                            <input type="text" class="form-control" id="nombre" v-model="nombre" placeholder="Ej: Machucho Hiram"  required="">
                                            <div class="valid-feedback">
                                               Buen nombre!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese un nombre.
                                            </div>
                                        </div>
                                      
                                      <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Apellidos </label>
                                            <input type="text" class="form-control" id="apellido" v-model="apellido" placeholder="Ej: Perez Cadena"  required="">
                                            <div class="valid-feedback">
                                               Correcto!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese los apellidos.
                                            </div>
                                        </div>
                                        
                                    </div>
                      
                       <div class="form-row">
                         <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Telefono</label>
                                            <input type="text" class="form-control" id="telefono" v-model="telefono" placeholder="Ej: 8341234567"  maxlength="10" required="">
                                            <div class="valid-feedback">
                                               Correcto!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese un telefono.
                                            </div>
                                        </div>
                         
                         <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Email</label>
                                            <input type="email" class="form-control" id="email" v-model="email" placeholder="Ej: ejemplo@ejemplo.com"    required="">
                                            <div class="valid-feedback">
                                               Correcto!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese una extension.
                                            </div>
                                        </div> 
                      </div>  
                      <div class="form-row">
                       <div class="form-row" v-if="seen"> 
                          <div class="alert alert-danger" role="alert" >No se ha guardado el instructor, esto puede ser causado por:<br>*No se ingresaron todos los datos correctamente<br> *Correo electronico del instructor ya registrado </div>
                      </div>
                         </div>
                                          </div>
                  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  @click="cerrarModal()" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarInstructor()" >Guardar</button>
              <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarInstructor()" >Actualizar</button>
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
        seen:false,
        nombre: '',
        id_academia: 0,
         id: 0,
        telefono: '',
        email: '',
        usuario: '',
        password: '',
        condicion: 0,
        apellido:'',
        pais:'',
        extension:'',
        idioma:'',
        cargo:'',
        arrayInstructor: [],
        modal:0,
        tituloModal:'',
        tipoAccion:0,
        arrayAcademias:[],
        usuario_id:0,
         pagination : {
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
      listarInstructores(page,buscar,criterio) {
        let me = this;
        var url= '/instructor?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
        axios.get(url).then(function(response) {
          //me.arrayInstructor=response.data;
            var respuesta= response.data;
          me.seen=false;
                    me.arrayInstructor = respuesta.instructores.data; 
            me.pagination= respuesta.pagination;
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
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
  title: 'Estas seguro de acttivar el instructor?',
  text: "Puedes cambiar esto después",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;           
                    axios.put('/instructor/activar',{
                        'id': id
                    }).then(function (response) {
                         me.listarInstructores(1,'','nombre');
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
      'El instructor ha sido activado.',
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
      desactivarInstructor(id){
         const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de desactivar el instructor?',
  text: "Puedes volver a activarlo despuès",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;
                    axios.put('/instructor/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarInstructores(1,'','nombre');
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
      'El instructor ha sido desactivado.',
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
            }
      ,selectAcademias(){
                let me=this;
                var url= '/academia/selectAcademias';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayAcademias = respuesta.academias;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
      cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarInstructores(page,buscar,criterio);
            },
       actualizarInstructor(){
             
                let me = this;
console.log(this.nombre);
                axios.put('/instructor/actualizar',{ 
                     'id_academia': this.id_academia,
                   'id': this.id, 
                    'nombre': this.nombre,
                    'telefono': this.telefono,
                    'email': this.email, 
                   'apellido': this.apellido,
     
                }).then(function (response) {
                    me.cerrarModal();
                  me.listarInstructores(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
              
      registrarInstructor(){
                let me = this;
                axios.post('/instructor/registrar',{
                 'id_academia': this.id_academia,
                   'id': this.id, 
                    'nombre': this.nombre,
                    'telefono': this.telefono,
                    'email': this.email, 
                   'apellido': this.apellido,
                }).then(function (response) {
                    me.cerrarModal();
                  me.seen=false;
                    me.listarInstructores(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                  me.seen=true;
                });
            },
      cerrarModal(){
                this.modal=0;
                this.tituloModal='';
               this.idrol=0;
                this.nombre='';
        this.usuario='';
                this.telefono='';
                this.email='';
                this.password='';
        this.seen=false;
            },
      abrirModal(modelo, accion, data = []) {
        switch (modelo) {
          case "instructor": {
             switch(accion){
              case 'registrar':{
                this.modal=1;
                this.id_academia=0;
                this.nombre='';
                this.telefono='';
                this.email='';
                this.usuario='';
                this.password='';    
                this.apellido='';
        this.pais='';
        this.extension='';
        this.cargo='';
        this.idioma='';
                this.tipoAccion = 1;
                this.tituloModal='Registrar Instructor'
                break;
              }
              case 'actualizar':{
                console.log(data['nombre']);
                                this.modal=1;
                                this.tituloModal='Actualizar Instructor';
                                this.tipoAccion=2;
                                this.id=data['id'];
                                this.id_academia=data['id_academia'];
                this.telefono=data['telefono']; 
                this.nombre=data['nombre'];
                this.email=data['email'];
                    this.apellido=data['apellido']; 
                this.password='';  
                                break;
              } 
            }
          }
        }
      }
    },
    mounted() {
      this.selectAcademias();
      this.listarInstructores(1,this.buscar,this.criterio);
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