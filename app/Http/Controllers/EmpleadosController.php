<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Obtener la lista de empleado de 5 en 5
        $datos['empleados']=Empleados::paginate(3);

        // return view('empleados.index',compact($datos,$parametro,$nombre));
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //MANDAR VISTA DONDE CREAMOS UN NUEVO REGISTRO DE EMPLEADO

        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // VALIDAR INFORMACION
        $campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:1000|mimes:jpeg,png,jpg'
        ];

        $mensaje =['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        // GUARDAMOS LOS DATOS DEL EMPLEADO EN LA BASE DE DATOS
        // $datosEmpleados = request()->all();
        // RECUPERAR DATOS DEL EMPLEADO
        $datosEmpleados = request()->except('_token');

        // Validar si viene la img
        if($request->hasFile('Foto')){
 
            // Guardar la ruta de img y pasarla a la carpeta uploads
            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');

            // Guardar los datos en la Base de Datos
            Empleados::insert($datosEmpleados);
            // return response()->json($datosEmpleados);
            return redirect('empleados')
                    ->with('Mensaje','Empleado agregado con éxito');

        }else{
            
            $response = array(
                'Error'=>'Debes de seleccionar una imagen',
                'Code'=>'404'
            );
            return response()->json($response);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $empleado = Empleados::where('id',$id)
                                ->get();

        // $empleado = Empleados::findOrFail($id);
        return view('empleados.edit',compact("empleado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        // VALIDAR INFORMACION

        $campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            
        ];

        if($request->hasFile('Foto')){

            $campos +=['Foto' => 'required|max:1000|mimes:jpeg,png,jpg'];
        }

        $mensaje =['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosEmpleados = request()->except([
                                        '_token',
                                        '_method'
                                    ]);

        // CHECAR SI SELECCIONO UNA IMG
        if($request->hasFile('Foto')){

            $empleado = Empleados::where('id',$id)
                                    ->get();
            // ELIMINAR LA IMG ANTIGUA
            Storage::delete('public/'.$empleado[0]->Foto);

            // CARGAR LA NUEVA RUTA DE LA IMG Y MOVER LA IMG A LA UPLOADS
            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads','public');

        }

        Empleados::where('id',$id)->update($datosEmpleados);                                
         
        $empleado = Empleados::where('id',$id)
                                ->get();

                        
        return redirect('empleados')
                ->with('Mensaje','Empleado editado con éxito');                             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empleado = Empleados::where('id',$id)
                                    ->get();
        // Eliminar la img antigua
        if(Storage::delete('public/'.$empleado[0]->Foto)){
            Empleados::destroy($id);
        }

        return redirect('empleados')
                ->with('Mensaje','Empleado eliminado');
    }
}
