<template> 
<div class="app-main__outer"> 
                    <div class="app-main__inner">
                       <!---AQUI VA EL TITULO DE LA PAGINA----> 
                       <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Tablero Principal 
                                        <div class="page-title-subheading">Bienvenido al tablero principal.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                  <!---AQUI VA EL CONTENIDO PRINCIPAL---->                
                  <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Usuarios Activos</div>
                                            <div class="widget-subheading">Usuarios activos con acceso al sistema</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                             <template>
                                                <span v-model="varcantidad" v-text="varcantidad"></span>
                                              </template>
  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Grupos</div>
                                            <div class="widget-subheading">Total de Grupos activos</div>
                                        </div>
                                        <div class="widget-content-right">
                                           <div class="widget-numbers text-white">
                                             <template>
                                                <span v-model="vargrupo" v-text="vargrupo"></span>
                                              </template>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Academias</div>
                                            <div class="widget-subheading">Academias activas</div>
                                        </div>
                                        <div class="widget-content-right">
                                           <div class="widget-numbers text-white">
                                             <template>
                                                <span v-model="varacademia" v-text="varacademia"></span>
                                              </template>
  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Instructores</div>
                                            <div class="widget-subheading">Instructores activos</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                             <template>
                                                <span v-model="varinstructor" v-text="varinstructor"></span>
                                              </template>
  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders</div>
                                                <div class="widget-subheading">Last year expenses</div>
                                            </div>
                                            <div class="widget-content-right">
                                   
                                             <template>
                                                <span  class="widget-numbers text-danger" v-model="varaprobados" v-text="varaprobados"></span>
                                              </template>
  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Reprobados</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                             
                                             <template>

                                                <span  class="widget-numbers text-danger" v-model="varreprobados" v-text="varreprobados"></span>
                                              </template>
  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Administradores</div>
                                                <div class="widget-subheading">Administradores del sitio</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger" v-model="varadmin" v-text="varadmin"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Income</div>
                                                <div class="widget-subheading">Expected totals</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-focus">$147</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Expenses</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="row">
                         
                          
                            <div class="col-md-6 col-lg-6">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                         Anuncios
                                        </div> 
                                    </div>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="imagen1.png" alt="First slide" height="290" width="400">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="imagen2.png" alt="Second slide" height="290" width="400">
                                </div>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="imagen3.jpg" alt="Third slide" height="290" width="400">
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-6">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                          Usuarios registrados en el ultimo mes
                                        </div> 
                                    </div>
                            <div class="card mb-12 widget-chart widget-chart2 text-left w-100">
                                                    <div class="widget-chat-wrapper-outer">
                                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                           <canvas id="chart1"   ></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                              
                            </div>
                          
                        
                          
                        </div>
                      
  
                    </div>
                    
</div>
</template>

</script>
<script>
  export default {
    data() {
      return {
       varTotal:null,
                charTotal:null,
                cuenta:[],
                varTotalTotal:[],
                varMesTotal:[],
        cantidad:[],
        varcantidad:[],
         vargrupo:[],
        grupo:[],
        academia:[],
        varacademia:[],
        instructor:[],
        varinstructor:[],
        reprobados:[],
        aprobados:[],
        varreprobados:[]
        ,varaprobados:[],
        admin:[],
        varadmin:[],
        preprobados:0,
        paprobados:0,
        
      }
    },
    methods: {
      getTotal(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.cuenta = respuesta.ingreso;
                    //cargamos los datos del chart
                  me.cantidad= respuesta.usuarios;
                   me.grupo=respuesta.grupo;
                   me.academia=respuesta.academia;
                    me.instructor=respuesta.instructor;
                   me.aprobados=respuesta.aprobados;
                  me.admin=respuesta.admin;
                   me.reprobados=respuesta.reprobados;
                  me.paprobados=respuesta.paprobados;
                  me.preprobados=respuesta.preprobados;
                  console.log( me.reprobados);
                  console.log(me.aprobados);
                  me.loadTotal();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
      
       loadTotal(){
         
                let me=this;
      //   console.log(me.cuenta);
         me.cantidad.map(function(x){
                    me.varcantidad.push(x.activos);
                });
         
         me.grupo.map(function(x){
                    me.vargrupo.push(x.activos);
                });
         me.admin.map(function(x){
                    me.varadmin.push(x.activos);
                });
         me.academia.map(function(x){
                    me.varacademia.push(x.activos);
                });
         me.instructor.map(function(x){
                    me.varinstructor.push(x.activos);
                });
         
          me.aprobados.map(function(x){
                    me.varaprobados.push(x.activos);
                });
         
          me.reprobados.map(function(x){
                    me.varreprobados.push(x.activos);
                });
         me.cuenta.map(function(x){
                  
                    me.varMesTotal.push(x.mes);
                    me.varTotalTotal.push(x.total);
                });
         // console.log('reparto000');
       //   console.log(me.varcantidad);
                me.varTotal=document.getElementById('chart1').getContext('2d');
        // console.log('reparto');
//console.log(me.varMesTotal);
       //  console.log('reparto2');
     //    console.log(me.varTotalTotal);
                me.charTotal = new Chart(me.varTotal, {
                    type: 'bar',
                    data: {
                        labels: me.varMesIngreso,
                        datasets: [{
                            label: 'Usuarios',
                            data: me.varTotalTotal,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
    },
    mounted() {
      this.getTotal();//console.log('Component mounted.')
      
    }
  }
</script>
