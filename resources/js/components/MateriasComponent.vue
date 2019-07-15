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
                                    <div>Pantalla de Materias 
                                      
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
                                    <div class="card-body"><h5 class="card-title">Tabla de Materias</h5>
                                      
                                      

<!-- Button trigger modal -->
<button type="button" @click="abrirModal('materia','registrar')" class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dimiss="modal"  data-backdrop="false">
 Nuevo
  <span class="badge badge-light">MATERIA</span>
</button>
                                      <!--------------BARRA DE BUSQUEDA----------------->
                                      <br>
                                       <div class="col-lg-12">
                                           <!--------SEccion del selector de elementos de busqueda---------->
                                         <div class="col-mb-4">
                                           <label><span>Buscar por:</span></label>
                                         <select    class="  btn btn-focus"   v-model="criterio">
                                                <option    class="dropdown-item">nombre</option>
                                                 
                                            </select>
                                            </div>
                                          <!------------------>
                                         <br>
                                          <div class="col-mb-8" style="position: relative;">
                                        <div class="search-wrapper active">
                                          <div class="input-holder">
                                            <input type="text" v-model="buscar" @keyup.enter="listarMaterias(1,buscar,criterio)" placeholder="Escriba para buscar registros" class="search-input">
                                            <button  type="submit" class="search-icon" @click="listarMaterias(1,buscar,criterio)">
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
                                                   <!----- <th>Contraseña</th>--->
                                                    <th>Condición</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for=" materia in arrayMaterias" :key="materia.id">
                                                     <th scope="row">
                                                       <template v-if="materia.condicion">
                                      <button type="button" class="mb-2 mr-2 btn btn-success"  @click="desactivarMateria(materia.id)"><i class="pe-7s-sun"> </i>Desactivar </button> 
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
 <button type="button" class="mb-2 mr-2 btn btn-danger"  @click="activarMateria(materia.id)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use trash"></i>Activar</button>
                                            
                                        </template>
                                                     
                                                      <button type="button" class="mb-2 mr-2 btn btn-warning" @click="abrirModal('materia','actualizar', materia)"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square"></i>Modificar</button>
                                                    </th>
                                                   
                                                  <td v-text="materia.nombre"> </td> 
                                                   <!----  <td v-text="usuario.password"> </td>---->
                                                   <td  >
                                                   <div v-if="materia.condicion == 1">
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
                                         
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Nombre de Materia </label>
                                            <input type="text" class="form-control" id="nombre" v-model="nombre" placeholder="Ej: CCNA"  required="">
                                            <div class="valid-feedback">
                                               Buen nombre!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese un nombre.
                                            </div>
                                        </div>
                                    
                                        
                                    </div>
                       
                                          </div>
                  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  @click="cerrarModal()" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarMateria()" >Guardar</button>
              <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarMateria()" >Actualizar</button>
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
        idrol: 0,
        telefono: '',
        id:0,
        email: '',
        usuario: '',
        password: '',
        condicion: 0,
        apellido:'',
        pais:'',
        extension:'',
        idioma:'',
        cargo:'',
        arrayMaterias: [],
        modal:0,
        tituloModal:'',
        tipoAccion:0,
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
      listarMaterias(page,buscar,criterio) {
        let me = this;
        var url= '/materia?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;;
        axios.get(url).then(function(response) {
          //me.arrayMaterias=response.data;
            var respuesta= response.data;
                    me.arrayMaterias = respuesta.materias.data; 
            me.pagination= respuesta.pagination;
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
      },
      activarMateria(id){
         const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de activar la materia?',
  text: "Puedes cambiar esto después",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;
                    axios.put('/materia/activar',{
                        'id': id
                    }).then(function (response) {
                         me.listarMaterias(1,'','nombre');
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
      'La materia ha sido activada.',
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
      desactivarMateria(id){
         const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de desactivar la materia?',
  text: "Puedes volver a activarlo despuès",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;
                    axios.put('/materia/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarMaterias(1,'','nombre');
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
      'La materia ha sido desactivada.',
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
      ,
      cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarMaterias(page,buscar,criterio);
            },
       actualizarMateria(){
             
                let me = this;
console.log(this.nombre);
                axios.put('/materia/actualizar',{  
                   'id': this.id,
                  'nombre':this.nombre,
                 
                }).then(function (response) {
                    me.cerrarModal();
                  me.listarMaterias(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
              
      registrarMateria(){
                let me = this;
                axios.post('/materia/registrar',{
                    
                    'nombre': this.nombre,
                     
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarMaterias(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
      cerrarModal(){
                this.modal=0;
                this.tituloModal='';
               this.idrol=0;
        this.id=0;
                this.nombre='';
        this.usuario='';
                this.telefono='';
                this.email='';
                this.password='';
            },
      abrirModal(modelo, accion, data = []) {
        switch (modelo) {
          case "materia": {
             switch(accion){
              case 'registrar':{
                this.modal=1;
                this.idrol=0;
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
                this.tituloModal='Registrar Materia'
                break;
              }
              case 'actualizar':{
                console.log(data['nombre']);
                                this.modal=1;
                                this.tituloModal='Actualizar Materia';
                                this.tipoAccion=2;
                                this.id=data['id']; 
                this.nombre=data['nombre'];
               
                                break;
              } 
            }
          }
        }
      }
    },
    mounted() {
      this.listarMaterias(1,this.buscar,this.criterio);
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