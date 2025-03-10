<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil()
    {
        $usuario = [
            'nombre' => 'Juan Pérez',
            'email' => 'juanperez@email.com',
            'telefono' => '555-1234-567',
        ];

        return view('perfil', compact('usuario'));
    }

    public function historial()
    {
        $compras = [
            [
                'id' => 1,
                'fecha' => '2025-03-01',
                'total' => 250.00,
                'productos' => [
                    ['nombre' => 'Manzanas', 'cantidad' => 2, 'precio' => 50.00],
                    ['nombre' => 'Leche', 'cantidad' => 1, 'precio' => 30.00],
                ],
            ],
            [
                'id' => 2,
                'fecha' => '2025-03-05',
                'total' => 400.00,
                'productos' => [
                    ['nombre' => 'Pan', 'cantidad' => 1, 'precio' => 20.00],
                    ['nombre' => 'Huevos', 'cantidad' => 1, 'precio' => 50.00],
                ],
            ],
        ];

        return view('historial', compact('compras'));
    }

    public function detallePedido($id)
    {
        $compras = [
            1 => [
                'id' => 1,
                'fecha' => '2025-03-01',
                'total' => 250.00,
                'productos' => [
                    ['nombre' => 'Manzanas', 'cantidad' => 2, 'precio' => 50.00],
                    ['nombre' => 'Leche', 'cantidad' => 1, 'precio' => 30.00],
                ],
            ],
            2 => [
                'id' => 2,
                'fecha' => '2025-03-05',
                'total' => 400.00,
                'productos' => [
                    ['nombre' => 'Pan', 'cantidad' => 1, 'precio' => 20.00],
                    ['nombre' => 'Huevos', 'cantidad' => 1, 'precio' => 50.00],
                ],
            ],
        ];

        return response()->json($compras[$id] ?? []);
    }
}
