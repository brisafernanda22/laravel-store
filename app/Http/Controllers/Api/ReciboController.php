<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recibo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ReciboController extends Controller

{   public function index()
    {
        $recibs = Recibo::all();
        return $recibs;
    }


    
    public function show($id)
    {
        $recibo = Recibo::find($id);
        return $recibo;
    }

   
    public function update(Request $request, $id)
    {
        $recibo = Recibo::findOrFail($request->id);
        $recibo->nombre = $request->nombre;
        $recibo->precio = $request->precio;
        $recibo->categoria = $request->categoria;

        $recibo->save();
        return $recibo;
    }

    
    public function destroy($id)
    {
        $recibo = Recibo::destroy($id);
        return $recibo;
    }

    public function store(Request $request)
    {
        $recibo = new Recibo();
        $recibo->total=$request->total;
        $recibo->registro = date("Y-m-d H:i:s");

        try {
            //code...
            $recibo->save();
            return response() -> json(["message"=>"Recibo guardado"]);
        } catch (\Throwable $th) {
            return response() -> json(["message"=>"Error inesperado", "Error" => $th], 401);
        }

    }


}

