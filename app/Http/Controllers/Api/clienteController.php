<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class clienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        if ($clientes->isEmpty()) {
            $data = [
                'message' => 'No hay clientes registrados',
                'status' => 204
            ];
            return response()->json($data, 204);
        }

        $data = [
            'marcas' => $clientes,
            'message' => 'Listado de clientes',
            'status' => 200,
        ];

        return response()->json($clientes, 200);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
        ]);

        if (!$cliente) {
            $data = [
                'message' => 'Error al guardar la Cliente',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }

        $data = [
            'marca' => $cliente,
            'message' => 'Cliente guardada',
            'status' => 201,
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'Cliente no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $data = [
            'marca' => $cliente,
            'message' => 'Cliente encontrada',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'Cliente no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        $data = [
            'marca'     => $cliente,
            'message'   => 'Cliente actualizada',
            'status'    => 200,
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'Cliente no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $cliente->delete();

        $data = [
            'message' => 'Cliente eliminada',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }
}
