<?php

// app/Http/Controllers/ArticuloController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index(Request $request)
    {
        // Lista de artículos ficticios con categorías
        $articulos = [
            ['id' => 1, 'nombre' => 'Laptop', 'precio' => 1200, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 2, 'nombre' => 'Smartphone', 'precio' => 800, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 3, 'nombre' => 'Reloj Inteligente', 'precio' => 300, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 4, 'nombre' => 'Auriculares', 'precio' => 150, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 5, 'nombre' => 'Cámara Digital', 'precio' => 600, 'categoria' => 'Fotografía', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 6, 'nombre' => 'Tablet', 'precio' => 350, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 7, 'nombre' => 'Teclado Mecánico', 'precio' => 100, 'categoria' => 'Periféricos', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 8, 'nombre' => 'Ratón Gaming', 'precio' => 50, 'categoria' => 'Periféricos', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 9, 'nombre' => 'Monitor 4K', 'precio' => 400, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 10, 'nombre' => 'Smartwatch', 'precio' => 250, 'categoria' => 'Electrónica', 'imagen' => 'https://via.placeholder.com/150'],
            ['id' => 11, 'nombre' => 'Silla Ergonomica', 'precio' => 200, 'categoria' => 'Mobiliario', 'imagen' => 'https://via.placeholder.com/150'],
            // ... más productos
        ];

     // Filtros de búsqueda
     if ($request->has('nombre')) {
        $articulos = array_filter($articulos, function ($articulo) use ($request) {
            return stripos($articulo['nombre'], $request->nombre) !== false;
        });
    }

    if ($request->has('precio')) {
        $articulos = array_filter($articulos, function ($articulo) use ($request) {
            return $articulo['precio'] <= $request->precio;
        });
    }

    if ($request->has('categoria') && $request->categoria !== 'todas') {
        $articulos = array_filter($articulos, function ($articulo) use ($request) {
            return $articulo['categoria'] === $request->categoria;
        });
    }

    return view('welcome', compact('articulos'));
}
}