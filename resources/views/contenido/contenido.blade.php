@extends('principal')
@section('contenido')


@if(Auth::check())
          @if(Auth::user()->idrol==1)
           <template v-if="menu==0">
              <example-component></example-component>
           </template>

<template v-if="menu==1">
  <usuarios-component></usuarios-component>
</template>

<template v-if="menu==2">
  <h1>
    Roles
  </h1>
</template>


<template v-if="menu==3">
  <academias-component></academias-component>
</template>


<template v-if="menu==4">
  
    <grupos-component></grupos-component>
   
</template>


<template v-if="menu==5">
  <instructores-component></instructores-component>
</template>

<template v-if="menu==6">
  <materias-component></materias-component>
</template>


<template v-if="menu==7">

  <tickets-component></tickets-component>
</template>

 
          @elseif(Auth::user()->idrol==2)
        <template v-if="menu==4">
  <h1>
    Grupos
  </h1>
</template>


<template v-if="menu==5">
  <h1>
    Instructores
  </h1>
</template>

<template v-if="menu==7">
  <tickets-component></tickets-component>
</template>
 

          @else
        
          @endif
@endif




@endsection