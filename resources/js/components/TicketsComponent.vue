 
<template>  
<!------ Include the above in your HEAD tag ---------->

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
                                    <div>Pantalla de Tickets 
                                      
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
                                 <div class="container card-body">
<h3 class="text-center">Mensajes</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
            <h5 class="card-title">Mensajes</h5>
            </div>
            <div class="col-mb-4">
                                           <label><span>Buscar por:</span></label>
                                         <select    class="  btn btn-focus"   v-model="criterio">
                                           <template v-if="id_cuenta_rol==1">
                                               <option    class="dropdown-item">nombre</option>
                                            </template>
<template v-else>
 <option    class="dropdown-item">nombre_admin</option>
                                              </template>
                                                <option    class="dropdown-item">asunto</option> 
                                            <option    class="dropdown-item"></option> 
                                            </select>
                                            </div> 
            <button type="button" @click="abrirModal('mensaje','registrar')" class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dimiss="modal"  data-backdrop="false">
 Nuevo
  <span class="badge badge-light">Mensaje</span>
</button>
                
            
            <div class="srch_bar">
              <div class="stylish-input-group">
              
                <input type="text" class="search-bar" v-model="buscar"  @keyup.enter="listarTickets(1,buscar,criterio)" placeholder="Buscar chat" >
                <span class="input-group-addon">
                <button type="button" @click="listarTickets(1,buscar,criterio)" > <i class="fa fa-search" aria-hidden="true"></i> </button>
  </span>  </div>
            </div> 
          </div>
          <div class="inbox_chat">
            
            <div class="chat_list  " v-for=" ticket in arrayTickets" :key="ticket.id" v-if="ticket.condicion==1" :class="[ticket.id == id_ticket_actual ? 'active_chat' : '']">
              <div class="chat_people" @click="listarMensajes(ticket.id)">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <template v-if="ticket.nombre==nombre_cuenta" >
                     <h5 v-text="ticket.nombre_admin"></h5>
                  </template>
                  <template v-else>
                  <h5 v-text="ticket.nombre"></h5>                    
                  </template>
                  <button type="button" class="btn btn-primary"   @click="desactivarTicket(ticket.id)" >Borrar</button>
            
                  <template v-if="ticket.nuevo == 1">
                  <span class="chat_date" >NUEVO</span>                 
                  </template>
                   <b>Asunto:</b>
                  <p v-text="ticket.asunto"></p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!---SECCION PARA LOS MENSAJES--->
        <div class="mesgs">
          <div class="msg_history">
            <!------------MENSAJES---------------->
            <div v-for=" mensaje in arrayMensajes" :key="mensaje.id" >  
            <template v-if="mensaje.id_emisor == id_cuenta">
               <div class="outgoing_msg">
              <div class="sent_msg">
                <p v-text="mensaje.mensaje"></p>
                <span class="time_date" v-text="mensaje.fecha"></span> </div>
            </div> 
               </template> 

                <template v-else> 
                <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p  v-text="mensaje.mensaje"> </p>
                  <span class="time_date"  v-text="mensaje.fecha"> </span></div>
              </div>
            </div> 
               </template>
   </div>
            <!------------FIN DE LA SECCION DE LOS MENSAJES---------------->
             
             
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
             
              <template v-if="id_ticket_actual!=0"> 
 <div  class="col-md-12">
                <div  class="col-md-6" style="position:absolute;">
     <input type="text" class="write_msg" placeholder="Escriba un mensaje" v-model="mensaje" />
                </div>
 <div  class="col-md-6" style="position:absolute; left:80%; padding-top:2%;">
      <button type="button"  class="mb-2 mr-2 btn-transition btn btn-outline-primary" @click="registrarMensaje()"  >Enviar </button> 
                </div>
      </div>

              </template>
                      
             
            </div>
          </div>
       
        </div>
      </div>  <p class="text-center top_spac"> NoHayCopyright <a target="_blank" href="">GoldenWind</a></p>
      </div></div> </div>  </div>
                    
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
                                            <label for="rol" class="">Select</label>
                                          <template>
                                           <select v-model="id_receptor"   class="form-control"> 
                                             <option value="0" :selected="true" >Selecciona una opción</option>
                                                <option   v-for=" usuario in arrayUsuarios" :key="usuario.id" v-bind:value="usuario.id" v-text="usuario.nombre">
                                                 
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
                                            <label for="validationCustom02">Asunto </label>
                                            <input type="text" class="form-control" id="asunto" v-model="asunto" placeholder="Ej: Reunion de trabajo"  required="">
                                            <div class="valid-feedback">
                                               Correcto!
                                            </div>
                                           <div class="invalid-feedback">
                                               Porfavor ingrese un nombre.
                                            </div>
                                        </div>
                                      
                                    
                                        
                                    </div>
                      
                       
                                          </div>
                  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  @click="cerrarModal()" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" v-if="tipoAccion==1" @click="registrarTicket()" >Guardar</button>
              <button type="button" class="btn btn-primary" v-if="tipoAccion==2" @click="actualizarUsuario()" >Actualizar</button>
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
        id_cuenta:0,
        id_ticket_actual:0,
        nombre_cuenta:'',
        id_cuenta_rol:0,
        nombre: '',
        idrol: 0,
        asunto:'',
        id_receptor:0,
        id_usuario1:0,
        telefono: '',
        mensaje:'',
        email: '',
        arrayUsuarios:[],
        usuario: '',
        password: '',
        condicion: 0,
        apellido:'',
        pais:'',
        extension:'',
        idioma:'',
        cargo:'',
        arrayTickets: [],
         arrayMensajes: [],
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
      listarTickets(page,buscar,criterio,id_user) {
        let me = this;
        var url= '/ticket?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio + '&ide='+ this.id_cuenta;
        console.log(url);
        axios.get(url).then(function(response) {
          //me.arrayUsuarios=response.data;
            var respuesta= response.data;
                    me.arrayTickets = respuesta.tickets.data; 
            me.pagination= respuesta.pagination;
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
      },
       listarMensajes(id_mensaje) {
        let me = this;
         me.id_ticket_actual=id_mensaje;  
        var url= '/ticket/getMensaje?ide='+id_mensaje ;
        console.log(url);
        axios.get(url).then(function(response) {
          //me.arrayUsuarios=response.data;
            var respuesta= response.data;
              me.arrayMensajes = respuesta.mensajes.data; 
          // this.listarTickets(1,this.buscar,this.criterio,this.id_cuenta);
            //me.pagination2= respuesta.pagination2;
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
           console.log(me.id_ticket_actual);
         axios.put('/ticket/desactivar',{
                        'id': me.id_ticket_actual
                    }).then(function (response) {
                        me.listarTickets(1,me.buscar,me.criterio,me.id_cuenta); 
                    }).catch(function (error) {
                        console.log(error);
                    });
         
      },
      selectUsuarios(){
                let me=this;
                var url= '/usuario/selectUsuarios2?idrol='+me.id_cuenta_rol;
                axios.get(url).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayUsuarios = respuesta.usuarios;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
      activarUsuario(id){
         const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de acttivar el usuario?',
  text: "Puedes cambiar esto después",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;
                    axios.put('/ticket/activar',{
                        'id': id
                    }).then(function (response) {
                         me.listarTickets(1,'','nombre');
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
      'El usuario ha sido activado.',
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
      desactivarTicket(id){
         const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de desactivar el ticket?',
  text: "Puedes volver a activarlo despuès",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  
  if (result.value) {
    let me = this;
                    axios.put('/ticket/desactivar2',{
                        'id': id
                    }).then(function (response) {
                         me.listarTickets(1,me.buscar,me.criterio,me.id_cuenta);
                      me.id_ticket_actual=0;
                  me. listarMensajes(me.id_ticket_actual);
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
      'El usuario ha sido desactivado.',
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
                me.listarTickets(page,buscar,criterio);
            },
       actualizarUsuario(){
             
                let me = this;
console.log(this.nombre);
                axios.put('/ticket/actualizar',{ 
                     'idrol': this.idrol,
                   'id': this.usuario_id,
                  'usuario':this.usuario,
                    'nombre': this.nombre,
                    'telefono': this.telefono,
                    'email': this.email,
                    'password': this.password,
                   'apellido': this.apellido,
        'pais': this.pais,
        'extension':this.extension,
        'idioma':this.idioma,
        'cargo': this.cargo,
                }).then(function (response) {
                    me.cerrarModal();
                  me.listarTickets(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
               registrarMensaje(){
                let me = this;
                axios.post('/ticket/registrarMensaje',{
                    'id_ticket': this.id_ticket_actual,
                  'id_cuenta':this.id_cuenta,
                    'mensaje': this.mensaje, 
                }).then(function (response) {
                   me.mensaje='';
                  me.listarTickets(1,me.buscar,me.criterio,me.id_cuenta);
                  me. listarMensajes(me.id_ticket_actual);
                }).catch(function (error) {
                    console.log(error);
                });
            },
      registrarTicket(){
                let me = this;
                axios.post('/ticket/registrar',{
                    'id_receptor': this.id_receptor,
                  'id_cuenta':this.id_cuenta,
                    'asunto': this.asunto, 
                  'idrol': this.id_cuenta_rol,
                }).then(function (response) {
                    me.cerrarModal();
                   me.listarTickets(1,me.buscar,me.criterio,me.id_cuenta);
                  me. listarMensajes(me.id_ticket_actual);
                }).catch(function (error) {
                    console.log(error);
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
            },
      abrirModal(modelo, accion, data = []) {
        switch (modelo) {
          case "mensaje": {
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
                this.tituloModal='Crear Nuevo Mensaje'
                break;
              }
              case 'actualizar':{
                console.log(data['nombre']);
                                this.modal=1;
                                this.tituloModal='Actualizar usuario';
                                this.tipoAccion=2;
                                this.usuario_id=data['id'];
                                this.idrol=data['idrol'];
                this.telefono=data['telefono'];
                this.usuario=data['usuario'];
                this.nombre=data['nombre'];
                this.email=data['email'];
                    this.apellido=data['apellido'];
        this.pais=data['pais'];
        this.extension=data['extension'];
        this.cargo=data['cargo'];
        this.idioma=data['idioma'];
                this.password='';  
                                break;
              } 
            }
          }
        }
      }
    },
    mounted() {
      this.id_cuenta = document.getElementById("id").value;
      this.id_cuenta_rol = document.getElementById("rol").value;
      this.listarTickets(1,this.buscar,this.criterio,this.id_cuenta);
      this.nombre_cuenta = document.getElementById("nombre").value;
      console.log('Component mounted, el usuario es ' + this.nombre_cuenta + " con el id " + this.id_cuenta + "con el rol "+this.id_cuenta_rol );
      this.selectUsuarios();
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