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
            'primer_nombre' => 'required',
            'otros_nombres' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'sede' => 'required',
            'tipo_id' => 'required',
            'numero_id' => 'required',
            'email' => 'required|email',
            'fecha_ingreso' => 'required',
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
            'fecha_ingreso' => $request->fehca_ingreso,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
