<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function Producto(){
        return view('formulario');
    }
    public function Edit(){
        return view('edit');
    }
    public function Create(){
        return view('create');
    }
}
