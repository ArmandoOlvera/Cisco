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
                                    <div>Tablero Principal del Contacto Principal
                                        <div class="page-title-subheading">Bienvenido al tablero principal.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                  <!---AQUI VA EL CONTENIDO PRINCIPAL---->                
                   <div class="row">
                    <div class="col-lg-12">
                 
        <div class="main-card mb-12 card">
                                            <div class="card-body"><h5 class="card-title">Bienvenido</h5>
                                                <p>En este sistema podrás consultar a los administradores del centro de soporte con el que podrás enviar mensajes, para hacer esto puedes dar click en el boton de "Tickets" de la barra lateral izquierda.</p>
  
  <p>
    Por otra parte puedes tambien consultar los resultados de los grupos, dando click al boton "Resultados de cursos" en la barra lateral izquierda.
  </p></div>
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
