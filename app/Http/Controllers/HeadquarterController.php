<?php

namespace App\Http\Controllers;

use App\Models\Headquarter;
use Illuminate\Http\Request;
use App\Classes\FormatResponse;

class HeadquarterController extends FormatResponse
{
    public function index()
    {
        return response()->json(Headquarter::all());
    }
    //FUNCION PARA OBTENER LA UBICACION DE LAS SEDES
    public function get_location(Request $request)
    {
        $encodedString = $request->header('Api_key_authorized'); //SE OBTIENE LA LLAVE DEL HEADER
        $decodedString = base64_decode($encodedString);

        // if($decodedString == env('API_KEY_B64')) { //SE VALIDA SI LA LLAVE ES IGUAL A LA QUE SE ENCUENTRA EN EL ARCHIVO .ENV
            $all_locations = Headquarter::all(); //SE CONSULTAN TODAS LAS SEDES
            return $this->toJson($this->estadoExitoso($all_locations)); //SE RETORNA EL MENSAJE DE EXITO
        // } else {
        //     return $this->toJson($this->accesoDenegado()); //SE RETORNA EL MENSAJE DE ACCESO DENEGADO EN CASO DE QUE LA LLAVE SEA INCORRECTA
        // }
    }
}
