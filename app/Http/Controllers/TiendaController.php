<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = [
            ['id' => 1, 'nombre' => 'Laptop Gamer', 'precio' => 25000, 'imagen' => 'laptop.jpg'],
            ['id' => 2, 'nombre' => 'Mouse Inalámbrico', 'precio' => 500, 'imagen' => 'mouse.jpg'],
            ['id' => 3, 'nombre' => 'Teclado Mecánico', 'precio' => 1200, 'imagen' => 'teclado.jpg'],
            ['id' => 4, 'nombre' => 'Monitor 24" LED', 'precio' => 4000, 'imagen' => 'monitor.jpg'],
            ['id' => 5, 'nombre' => 'Silla Gamer', 'precio' => 5000, 'imagen' => 'silla.jpg'],
            ['id' => 6, 'nombre' => 'Audífonos Bluetooth', 'precio' => 1500, 'imagen' => 'audifonos.jpg'],
            ['id' => 7, 'nombre' => 'Micrófono Profesional', 'precio' => 2000, 'imagen' => 'microfono.jpg'],
            ['id' => 8, 'nombre' => 'Tablet Android', 'precio' => 7000, 'imagen' => 'tablet.jpg'],
            ['id' => 9, 'nombre' => 'Smartphone 5G', 'precio' => 12000, 'imagen' => 'smartphone.jpg'],
            ['id' => 10, 'nombre' => 'Disco Duro Externo 1TB', 'precio' => 2500, 'imagen' => 'disco.jpg'],
            ['id' => 11, 'nombre' => 'Tarjeta Gráfica RTX 3060', 'precio' => 12000, 'imagen' => 'rtx.jpg'],
            ['id' => 12, 'nombre' => 'Fuente de Poder 750W', 'precio' => 3000, 'imagen' => 'fuente.jpg'],
            ['id' => 13, 'nombre' => 'Procesador Ryzen 7', 'precio' => 8000, 'imagen' => 'ryzen.jpg'],
            ['id' => 14, 'nombre' => 'Placa Madre ASUS', 'precio' => 6000, 'imagen' => 'motherboard.jpg'],
            ['id' => 15, 'nombre' => 'Memoria RAM 16GB', 'precio' => 2500, 'imagen' => 'ram.jpg'],
            ['id' => 16, 'nombre' => 'SSD NVMe 1TB', 'precio' => 3500, 'imagen' => 'ssd.jpg'],
            ['id' => 17, 'nombre' => 'Case para PC', 'precio' => 4500, 'imagen' => 'case.jpg'],
            ['id' => 18, 'nombre' => 'Router WiFi 6', 'precio' => 3200, 'imagen' => 'router.jpg'],
            ['id' => 19, 'nombre' => 'Cámara Web 1080p', 'precio' => 1800, 'imagen' => 'camara.jpg'],
            ['id' => 20, 'nombre' => 'Impresora Láser', 'precio' => 5500, 'imagen' => 'impresora.jpg'],
            ['id' => 21, 'nombre' => 'Kit de Herramientas para PC', 'precio' => 800, 'imagen' => 'kit.jpg'],
            ['id' => 22, 'nombre' => 'Cargador Portátil 20000mAh', 'precio' => 1400, 'imagen' => 'cargador.jpg'],
            ['id' => 23, 'nombre' => 'Cable HDMI 2M', 'precio' => 300, 'imagen' => 'hdmi.jpg'],
            ['id' => 24, 'nombre' => 'Hub USB 3.0', 'precio' => 900, 'imagen' => 'hub.jpg'],
            ['id' => 25, 'nombre' => 'Lámpara LED Escritorio', 'precio' => 600, 'imagen' => 'lampara.jpg'],
        ];

        return view('tienda.index', compact('productos'));
    }

    public function verCarrito()
    {
        return view('tienda.carrito');
    }
}
