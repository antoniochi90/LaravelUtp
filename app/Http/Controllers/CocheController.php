<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CocheController extends Controller
{

    public function getall(){
        $coches = Coche::all();

        return response()->json($coches);
    }
    /**
     * Get que trae todos los datos.
     */
    public function index()
{
    $coches = Coche::all();

    // Aquí pasamos los datos a la vista
    return view('dashboard', compact('coches'));  // 'coches' es la variable que llega a la vista.
}

    public function create(){
        return view('components.create');
    }

    /**
     * Post para insertar datos.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validator->fails()) {
            $data = [
                'mesagge' => 'Error al validar los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data,400);
        }

        // Subir la imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = 'images/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($path, $filename);
            $imagespath = $path . $filename;
        }

        $coche = Coche::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'precio' => $request->precio,
            'imagen' => $imagespath,
        ]);
        return to_route('dashboard');

    }

    /**
     * Get para buscar por id.
     */
    public function show(Coche $coche, $id)
    {
        $coche = Coche::find($id);

        if (!$coche) {
            $data = [
                'mesagge' => 'Coche no encontrado',
                'status' => 404
            ];
            return \response()->json($data, 404);
        }

        $data = [
            'mesagge' => $coche,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function viewUpdate(string $id){
        $coche = Coche::find($id);
        return view('components.update', compact('coche'));
    }

    /**
     * Put para actualizar datos .
     */
    public function update(Request $request, string $id)
{
    $coche = Coche::find($id);

    if (!$coche) {
        return response()->json([
            'message' => 'Coche no encontrado',
            'status' => 404
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'marca' => 'required|string',
        'modelo' => 'required|string',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Imagen no obligatoria
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Error al validar los datos',
            'errors' => $validator->errors(),
            'status' => 400
        ], 400);
    }

    $coche->marca = $request->marca;
    $coche->modelo = $request->modelo;
    $coche->precio = $request->precio;

    // Manejar nueva imagen
    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $filename = time() . '-' . $file->getClientOriginalName();
        $path = $file->storeAs('public/images', $filename);
        $coche->imagen = str_replace('public/', '', $path); // Actualizar imagen
    }

    $coche->save();

    return to_route('dashboard')->with('success', 'Coche actualizado correctamente');
}


    /**
     * Delete para eliminar registros.
     */
    public function destroy(Coche $coche, $id)
    {

        $coche = Coche::find($id);

        if (!$coche){
            $data = [
            'mesagge' => 'Coche no encontrado',
            'status' => 404
            ];
            return response()->json($data, 404);
        } 

        $coche->delete();

        $data = [
            'mesagge' => 'Registro Eliminado',
            'status' => 200
        ];
        return to_route('dashboard');
    }

        
}
