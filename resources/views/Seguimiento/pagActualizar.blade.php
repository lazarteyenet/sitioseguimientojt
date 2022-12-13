@extends('pagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de actualizar Seguimiento </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>

    <form action="{{route('Seguimiento.xUpdate', $xActAlumnos->id)}}" method="post" class="d-grid gap-2">
    @method('PUT')    
    @csrf

        @error('idEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('ofiAct')
            <div class="alert alert-danger">
                El oficio es requerido 
            </div>
        @enderror

        @if($errors ->has('fecSeg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                La <strong>fecha</strong> es requerida
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="idEst" placeholder="Código" value="{{ $xActAlumnos->idEst}}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Trabajo actual...</option>
            <option value="0">Si</option>
            <option value="1">No</option>
        </select>

        <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ $xActAlumnos->ofiAct}}" class="form-control mb-2">
       
        <select name="satEst" class="form-control mb-2">
            <option value="">Satisfaccion del Estudiante...</option>
            <option value="0">No esta satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy Bueno</option>
        </select>

        <input type="text" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ $xActAlumnos->fecSeg}}" class="form-control mb-2">
        
        <select name="estSeg" class="form-control mb-2">
            <option value="">Estado del Seguimiento...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>



        
        


        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>

   
   
@endsection