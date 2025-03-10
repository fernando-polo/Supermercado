<?php
// app/Http/Controllers/PerfilController.php
// app/Http/Controllers/PerfilController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    // Vista de perfil
    public function index()
    {
        return view('perfil.index'); // Vista donde se muestra el perfil y los botones
    }

    // Vista de historial de compras
    public function historial()
    {
        $compras = [
            ['id' => 1, 'fecha' => '2025-03-01', 'total' => 500, 'productos' => [
                ['nombre' => 'mouse', 'precio' => 250],
                ['nombre' => 'pasta termica', 'precio' => 250],
            ]],
            ['id' => 2, 'fecha' => '2025-03-02', 'total' => 200, 'productos' => [
                ['nombre' => 'soporte', 'precio' => 100],
                ['nombre' => 'cargador generico', 'precio' => 100],
            ]],
            ['id' => 3, 'fecha' => '2025-03-05', 'total' => 300, 'productos' => [
                ['nombre' => 'estuche personalizado', 'precio' => 150],
                ['nombre' => 'mousepad', 'precio' => 150],
            ]],
        ];

        return view('perfil.historial', compact('compras'));
    }

    public function obtenerDirecciones()
    {
        // Verificamos si las direcciones existen en la sesión
        $direcciones = session('direcciones', [
            ['id' => 1, 'estado' => 'Jalisco', 'municipio' => 'Guadalajara', 'colonia' => 'Colonia Americana', 'calle' => 'Avenida Chapultepec', 'numero_casa' => '25', 'codigo_postal' => '44160'],
            ['id' => 2, 'estado' => 'CDMX', 'municipio' => 'Benito Juárez', 'colonia' => 'Narvarte', 'calle' => 'Calle de la Paz', 'numero_casa' => '30', 'codigo_postal' => '03020'],
        ]);

        return view('perfil.direcciones', compact('direcciones'));
    }

    public function agregarDireccion(Request $request)
    {
        // Validamos los datos recibidos
        $validated = $request->validate([
            'estado' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'numero_casa' => 'required|string|max:255',  // Validación para el número de casa
            'codigo_postal' => 'required|numeric',
        ]);

        // Obtener las direcciones de la sesión
        $direcciones = session('direcciones', []);
        
        // Agregar la nueva dirección al arreglo
        $direcciones[] = [
            'id' => rand(3, 1000), // Generar ID aleatorio
            'estado' => $validated['estado'],
            'municipio' => $validated['municipio'],
            'colonia' => $validated['colonia'],
            'calle' => $validated['calle'],
            'numero_casa' => $validated['numero_casa'],  // Guardamos el número de casa
            'codigo_postal' => $validated['codigo_postal'],
        ];

        // Guardar las direcciones en la sesión
        session(['direcciones' => $direcciones]);

        return redirect()->route('perfil.direcciones')->with('success', 'Dirección agregada exitosamente');
    }

    public function eliminarDireccion($id)
    {
        // Obtener las direcciones de la sesión
        $direcciones = session('direcciones', []);
        
        // Filtrar las direcciones eliminando la que coincide con el ID
        $direcciones = array_filter($direcciones, function ($direccion) use ($id) {
            return $direccion['id'] != $id;
        });

        // Guardar las direcciones actualizadas en la sesión
        session(['direcciones' => $direcciones]);

        return redirect()->route('perfil.direcciones')->with('success', 'Dirección eliminada exitosamente');
    }
    public function editarDireccion(Request $request, $id)
{
    // Validar los datos recibidos
    $validated = $request->validate([
        'estado' => 'required|string|max:255',
        'municipio' => 'required|string|max:255',
        'colonia' => 'required|string|max:255',
        'calle' => 'required|string|max:255',
        'numero_casa' => 'required|string|max:255',  // Validación para el número de casa
        'codigo_postal' => 'required|numeric',
    ]);

    // Obtener las direcciones de la sesión
    $direcciones = session('direcciones', []);

    // Buscar la dirección que queremos editar
    $direccionIndex = null;
    foreach ($direcciones as $index => $direccion) {
        if ($direccion['id'] == $id) {
            $direccionIndex = $index;
            break;
        }
    }

    // Si no encontramos la dirección, retornamos un error
    if ($direccionIndex === null) {
        return redirect()->route('perfil.direcciones')->with('error', 'Dirección no encontrada');
    }

    // Actualizar los datos de la dirección
    $direcciones[$direccionIndex] = [
        'id' => $id,
        'estado' => $validated['estado'],
        'municipio' => $validated['municipio'],
        'colonia' => $validated['colonia'],
        'calle' => $validated['calle'],
        'numero_casa' => $validated['numero_casa'],  // Guardamos el número de casa
        'codigo_postal' => $validated['codigo_postal'],
    ];

    // Guardar las direcciones actualizadas en la sesión
    session(['direcciones' => $direcciones]);

    return redirect()->route('perfil.direcciones')->with('success', 'Dirección actualizada exitosamente');
}
}

