<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosEmpleados=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Empleado::insert($datosEmpleados); //inserto los datos en la BD
        return redirect('empleado')->with('mensaje', 'Empleado creado con exito!!!');//redirigimos a pagina principal y mostramos mensaje de creacion exitosa
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Maneja el EDIT del empleado
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Recibe el formulario de Edicion
        $datosEmpleado = Request()->except(['_token', '_method']); //recibimos los datos
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->Foto);
            $datosEmpleado['Foto'] =$request->file('Foto')->store('uploads','public');
        }
        Empleado::where('id','=', $id)->update($datosEmpleado); //buscamos al empleado
        //return view('empleado.edit',compact('empleado'));
     
        return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Metodo para manejar un DELETE
        $empleado=Empleado::findOrFail($id);//buscamos al empleado
         Storage::delete('public/' . $empleado->Foto);//borramos su foto
        Empleado::destroy($id); //borramos su empleado
        return redirect('empleado')->with('mensaje','Empleado borrado correctamente');//redirigimos a la pagina principal y mostamos mensaje de borrado exitoso


    }
}
