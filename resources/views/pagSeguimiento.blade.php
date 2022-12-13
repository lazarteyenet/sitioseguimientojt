@extends('pagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de Seguimiento </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>

    <form action="{{route('Estudiante.xRegistrar2')}}" method="post" class="d-grid gap-2">
        @csrf

        @error('idEst')
            <div class="alert alert-danger">
                El id es requerido
            </div>
        @enderror

        

        <input type="text" name="idEst" placeholder="idEst" value="{{ old('idEst')}}" class="form-control mb-2">
        
        <select name="traAct" class="form-control mb-2">
            <option value="">Trabajo actual...</option>
            <option value="0">Si</option>
            <option value="1">No</option>
        </select>
        <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('ofiAct')}}" class="form-control mb-2">
        
        
        <select name="satEst" class="form-control mb-2">
            <option value="">Satisfaccion del Estudiante...</option>
            <option value="0">No esta satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy Bueno</option>
        </select>

        <input type="text" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ old('fecSeg')}}" class="form-control mb-2">
        
        

        <select name="estSeg" class="form-control mb-2">
            <option value="">Estado del Seguimiento...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>


        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <h3>Lista. Estamos en pag. {{ $xAlumnos->currentPage() }} de {{ $xAlumnos->count() }}</h3> 
   
    <div class="btn btn-dark d-grid fs-5 mb-2 bt-2">Lista de seguimiento...</div>
    
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Código</th>
                <th scope="col">Oficio Actual</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>

        <tbody>
            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->idEst }}</td>
                <td>
                    <a href="{{ route('Seguimiento.xDetalle', $item->id) }}">
                        {{ $item->ofiAct }}
                    </a>
                </td>
                <td>
                    <form action="{{route('Seguimiento.xEliminar',$item->id)}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            x
                        </button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{route('Seguimiento.xActualizar',$item->id)}}">
                    ...A
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

        <thead class="table-secondary">
            <tr>
                <th colspan="3">.</th>
            </tr>
        </thead>

    </table>

    {{ $xAlumnos->links() }}
   
@endsection