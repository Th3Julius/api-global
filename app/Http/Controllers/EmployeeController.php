<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        if($employees->isEmpty()){
            $data = [
                'message' => 'No hay empleados registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

       return response()->json($employees, 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'primer_nombre' => 'required|max:20',
            'otros_nombres' => 'required|max:50',
            'primer_apellido' => 'required|max:20',
            'segundo_apellido' => 'required|max:20',
            'sede' => 'required|in:Colombia,Estados Unidos',
            'tipo_id' => 'required',
            'numero_id' => 'required|max:20',
            'email' => 'required|email|unique:employee',
            // 'fecha_ingreso' => 'required',
            'area' => 'required',
            'estado' => 'required',
            'fechahora_registro' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        
        $employee = Employee::create([
            'primer_nombre' => $request->primer_nombre,
            'otros_nombres' => $request->otros_nombres,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'sede' => $request->sede,
            'tipo_id' => $request->tipo_id,
            'numero_id' => $request->numero_id,
            'email' => $request->email,
            // 'fecha_ingreso' => $request->fehca_ingreso,
            'area' => $request->area,
            'estado' => $request->estado,
            'fechahora_registro' => $request->fechahora_registro,
        ]);

        if(!$employee){
            $data = [
                'message' => 'Error al crear empleado',
                'status' => 500
            ];
            return response()->json($data,500);
        }

        $data = [
            'employee' => $employee,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $employee = Employee::find($id);
       
        
            if(!$employee){
                $data = [
                    'message' => 'Empleado no encontrado',
                    'status' => 404
                ];
                return response()->json($data, 404);
            }
            $data = [
                'employee' => $employee,
                'status' => 200
            ];
        
            return response()->json($data, 200);
            
        
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        
        if(!$employee){
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(),[
            'primer_nombre' => 'required|max:20',
            'otros_nombres' => 'required|max:50',
            'primer_apellido' => 'required|max:20',
            'segundo_apellido' => 'required|max:20',
            'sede' => 'required|in:Colombia,Estados Unidos',
            'tipo_id' => 'required',
            'numero_id' => 'required|max:20',
            'email' => 'required|email|unique:employee',
            // 'fecha_ingreso' => 'required',
            'area' => 'required',
            'estado' => 'required',
            'fechahora_registro' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $employee -> primer_nombre = $request -> primer_nombre;
        $employee -> otros_nombres = $request -> otros_nombres;
        $employee -> primer_apellido = $request -> primer_apellido;
        $employee -> segundo_apellido = $request -> segundo_apellido;
        $employee -> sede = $request -> sede;
        $employee -> tipo_id = $request -> tipo_id;
        $employee -> email = $request -> email;
        $employee -> area = $request -> area;
        $employee -> estado = $request -> estado;
        $employee -> fechahora_registro = $request -> fechahora_registro;
        
        $employee -> save();

        $data = [
            'message' => 'Empleado actualizado',
            'employee' => $employee,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        
        if(!$employee){
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $employee -> delete();

        $data = [
            'message' => 'Empleado eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
