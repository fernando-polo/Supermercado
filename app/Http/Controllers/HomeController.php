<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Artículos ficticios
        $articulos = [
            ['id' => 1, 'nombre' => 'Laptop', 'precio' => 750, 'categoria' => 'Electrónica'],
            ['id' => 2, 'nombre' => 'Smartphone', 'precio' => 350, 'categoria' => 'Electrónica'],
            ['id' => 3, 'nombre' => 'Camiseta', 'precio' => 25, 'categoria' => 'Ropa'],
            // ... Agrega al menos 25 artículos
        ];

        return view('home', compact('articulos'));
    }

    public function carrito(Request $request)
    {
        $carrito = session('carrito', []);
        $total = array_reduce($carrito, function ($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);

        return view('carrito', compact('carrito', 'total'));
    }

    public function buscar(Request $request)
    {
        $filtro = $request->input('filtro');
        $articulos = [
            ['id' => 1, 'nombre' => 'Laptop', 'precio' => 750, 'categoria' => 'Electrónica'],
            ['id' => 2, 'nombre' => 'Smartphone', 'precio' => 350, 'categoria' => 'Electrónica'],
            ['id' => 3, 'nombre' => 'Camiseta', 'precio' => 25, 'categoria' => 'Ropa'],
            // ... Agrega más artículos
        ];

        // Filtro por nombre, precio o categoría
        $resultados = array_filter($articulos, function ($articulo) use ($filtro) {
            return stripos($articulo['nombre'], $filtro) !== false || 
                   stripos($articulo['categoria'], $filtro) !== false ||
                   $articulo['precio'] == $filtro;
        });

        return view('home', compact('resultados'));
    }
    public function agregarAlCarrito(Request $request)
{
    $articuloId = $request->input('articulo_id');
    $cantidad = $request->input('cantidad');
    $articulos = [
        ['id' => 1, 'nombre' => 'Laptop', 'precio' => 750, 'categoria' => 'Electrónica'],
        ['id' => 2, 'nombre' => 'Smartphone', 'precio' => 350, 'categoria' => 'Electrónica'],
        // ... Agrega más artículos
    ];

    $articulo = collect($articulos)->firstWhere('id', $articuloId);

    if ($articulo) {
        $carrito = session('carrito', []);
        $carrito[] = [
            'id' => $articulo['id'],
            'nombre' => $articulo['nombre'],
            'precio' => $articulo['precio'],
            'cantidad' => $cantidad,
        ];
        session(['carrito' => $carrito]);
    }

    return redirect()->route('home');
}
}
