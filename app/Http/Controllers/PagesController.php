<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante1;
use App\Models\Seguimiento;
class PagesController extends Controller
{
   public function fnIndex (){
    return view('welcome');
   }

   public function fnRegistrar(Request $request){

      //return $request->all();         //Prueba de "token" y datos recibidos

      $request ->validate([
          'codEst' => 'required',
          'nomEst' => 'required',
          'apeEst' => 'required',
          'fnaEst' => 'required',
          'turMat' => 'required',
          'semMat' => 'required',
          'estMat' => 'required'
      ]);

      $nuevoEstudiante = new Estudiante1;
      $nuevoEstudiante->codEst = $request->codEst;
      $nuevoEstudiante->nomEst = $request->nomEst;
      $nuevoEstudiante->apeEst = $request->apeEst;
      $nuevoEstudiante->fnaEst = $request->fnaEst;
      $nuevoEstudiante->turMat = $request->turMat;
      $nuevoEstudiante->semMat = $request->semMat;
      $nuevoEstudiante->estMat = $request->estMat;
      
      $nuevoEstudiante->save();
      
      //$xAlumnos = Estudiante1::all();                      //Datos de BD
      //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
      return back()->with('msj','Se registro con éxito...'); //Regresar con msj
  }

   public function fnEstDetalle ($id){
      $xDetAlumnos=Estudiante1::findOrFail($id);
      return view('Estudiante.pagDetalle',compact('xDetAlumnos'));
     }

     public function fnEstDetalle2 ($id){
        $xDetAlumnos=Seguimiento::findOrFail($id);
        return view('Seguimiento.pagDetalle',compact('xDetAlumnos'));
       }

     public function fnEstActualizar($id){                   //Paso 1

      $xActAlumnos = Estudiante1::findOrFail($id);
      return view('Estudiante.pagActualizar', compact('xActAlumnos'));
  }

  public function fnEstActualizar2($id){                   //Paso 1

    $xActAlumnos = Seguimiento::findOrFail($id);
    return view('Seguimiento.pagActualizar', compact('xActAlumnos'));
}

  public function fnUpdate(Request $request, $id){        //Paso 2

      //return $request->all();         //Prueba de "token" y datos recibidos

      $xUpdateAlumnos = Estudiante1::findOrFail($id);

      $xUpdateAlumnos->codEst = $request->codEst;
      $xUpdateAlumnos->nomEst = $request->nomEst;
      $xUpdateAlumnos->apeEst = $request->apeEst;
      $xUpdateAlumnos->fnaEst = $request->fnaEst;
      $xUpdateAlumnos->turMat = $request->turMat;
      $xUpdateAlumnos->semMat = $request->semMat;
      $xUpdateAlumnos->estMat = $request->estMat;
      
      $xUpdateAlumnos->save();
      
      //$xAlumnos = Estudiante1::all();                        //Datos de BD
      //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
      return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
  }


  public function fnUpdate2(Request $request, $id){        //Paso 2

    //return $request->all();         //Prueba de "token" y datos recibidos

    $xUpdateSeguimiento = Seguimiento::findOrFail($id);

    $xUpdateSeguimiento->idEst = $request->idEst;
    $xUpdateSeguimiento->traAct = $request->traAct;
    $xUpdateSeguimiento->ofiAct = $request->ofiAct;
    $xUpdateSeguimiento->satEst = $request->satEst;
    $xUpdateSeguimiento->fecSeg = $request->fecSeg;
    $xUpdateSeguimiento->estSeg = $request->estSeg;
    
    
    $xUpdateSeguimiento->save();
    
    //$xAlumnos = Estudiante1::all();                        //Datos de BD
    //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
    return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
}

  public function fnEliminar($id){
      $deleteAlumno=Estudiante1::findOrFail($id);
      $deleteAlumno->delete();
      return back()->with('msj','Se elimino con éxito...');
}
public function fnEliminar2($id){
    $deleteSeguimiento=Seguimiento::findOrFail($id);
    $deleteSeguimiento->delete();
    return back()->with('msj','Se elimino con éxito...');
}

   public function fnLista (){
    //$xAlumnos=Estudiante1::all();
    $xAlumnos=Estudiante1::paginate(3);
    return view('pagLista',compact('xAlumnos'));
   }

   public function fnSeguimiento (){
    //$xAlumnos=Estudiante1::all();
    $xAlumnos=Seguimiento::paginate(3);//paginacion
    return view('pagSeguimiento',compact('xAlumnos'));
   }

   public function fnGaleria ($numero=0){
    $valor =$numero;
    $otro =25;

     return view('pagGaleria', compact('valor','otro'));
   }

   public function fnRegistrar2(Request $request){

    //return $request->all();         //Prueba de "token" y datos recibidos

    $request ->validate([
        'idEst' => 'required',
        'traAct' => 'required',
        'ofiAct' => 'required',
        'satEst' => 'required',
        'fecSeg' => 'required',
        'estSeg' => 'required'
        
    ]);

    $nuevoSeguimiento = new Seguimiento;
    $nuevoSeguimiento->idEst = $request->idEst;
    $nuevoSeguimiento->traAct = $request->traAct;
    $nuevoSeguimiento->ofiAct = $request->ofiAct;
    $nuevoSeguimiento->satEst = $request->satEst;
    $nuevoSeguimiento->fecSeg = $request->fecSeg;
    $nuevoSeguimiento->estSeg = $request->estSeg;
    
    $nuevoSeguimiento->save();
    
    //$xAlumnos = Estudiante1::all();                      //Datos de BD
    //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
    
    return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    
}
}
