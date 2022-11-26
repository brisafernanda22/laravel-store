<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return $productos;
    }

    
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->categoria=$request->categoria;
        $producto->image=$request->image;
        try {
            //code...
            $producto->create();
            return response() -> json(["message"=>"Parece que si se guardo"]);
        } catch (\Throwable $th) {
            return response() -> json(["message"=>"Error inesperado", "Error" => $th]);
        }

    }

    
    public function show($id)
    {
        $producto = Producto::find($id);
        return $producto;
    }

   
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria = $request->categoria;
        $producto->image=$request->image;
        $producto->save();
        return $producto;
    }

    
    public function destroy($id)
    {
        $producto = Producto::destroy($id);
        return $producto;
    }
}

