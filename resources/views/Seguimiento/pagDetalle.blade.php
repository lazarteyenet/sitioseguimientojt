@extends('pagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de detalle </h1>
@endsection

@section('seccion')
    
    <div class="btn btn-info d-grid display-3">Detalles del estudiante</div>

    <p>Id:                  {{ $xDetAlumnos -> id }} </p> 
    <p>Código:              {{ $xDetAlumnos -> idEst }} </p> 
    <p>Trabaja:             {{ $xDetAlumnos -> traAct }} </p> 
    <p>Oficio:              {{ $xDetAlumnos -> ofiAct }} </p> 
    <p>Satisfaccion:        {{ $xDetAlumnos -> satEst }} </p> 
    <p>Fecha de Seguimiento:       {{ $xDetAlumnos -> fecSeg }} </p> 
    <p>Estado de Seguimiento:      {{ $xDetAlumnos -> estSeg }} </p> 

    <div class="btn btn-info d-grid display-3">...</div>
    
@endsection
