<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

use function PHPUnit\Framework\isEmpty;

class marcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();

        if ($marcas->isEmpty()) {
            $data = [
                'message' => 'No hay marcas registradas',
                'status' => 204
            ];
            return response()->json($data, 204);
        }

        $data = [
            'marcas' => $marcas,
            'message' => 'Listado de marcas',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $marca = Marca::create([
            'nombre' => $request->nombre,
        ]);

        if (!$marca) {
            $data = [
                'message' => 'Error al guardar la marca',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }

        $data = [
            'marca' => $marca,
            'message' => 'Marca guardada',
            'status' => 201,
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            $data = [
                'message' => 'Marca no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $data = [
            'marca' => $marca,
            'message' => 'Marca encontrada',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            $data = [
                'message' => 'Marca no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $marca->nombre = $request->nombre;
        $marca->save();

        $data = [
            'marca' => $marca,
            'message' => 'Marca actualizada',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            $data = [
                'message' => 'Marca no encontrada',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $marca->delete();

        $data = [
            'message' => 'Marca eliminada',
            'status' => 200,
        ];

        return response()->json($data, 200);
    }

}
