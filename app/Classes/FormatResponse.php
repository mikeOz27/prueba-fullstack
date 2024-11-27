<?php

namespace App\Classes;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FormatResponse extends Controller{
    /**
	 * Formato de respuesta con Json
	 * @param $status
	 * @param $data
	 *
	 * @return Json
	 */
	public function toJson($status, $data = null)
	{
        /*
		|---------------------------------------------------------------------------------------
		| Definir salida de respuesta
		|---------------------------------------------------------------------------------------
		*/
		$response = [
			'status' => $status
        ];

		if($data !== null){
        	$response['data'] = $data;

        }

        /*
        |---------------------------------------------------------------------------------------
		| Transformar la respuesta a json
		|---------------------------------------------------------------------------------------
		*/
        // $response = Response::json($response);

        return $response;
	}

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta OK
	|---------------------------------------------------------------------------------------
	*/
	public function estadoExitoso($data = null)
	{
		$mensaje= "Procesado con éxito";
		return [
			'code' => 200,
			'message' => $mensaje,
            'data' => $data
		];
    }

	public function estadoRegistroExitosoSeguridad($data = null)
	{
		$mensaje= "Registro existoso";
		return [
			'code' => 200,
			'message' => $mensaje,
            'data' => $data
		];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta no encontrado
	|---------------------------------------------------------------------------------------
	*/
	public function estadoNoEncontrado($msj = null)
	{
		$mensaje = $msj == null ? "Resultado no encontrado" : $msj;
		return [
			'code' => 403,
			'message' => $mensaje
		];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta operación fallida en alguna parte del proceso
	|---------------------------------------------------------------------------------------
	*/
	public function estadoOperacionFallida($msj = null)
	{
		$mensaje = $msj == null ? "Error: Operación fallida" : $msj;
		return [
			'code' => 400,
			'message' => $mensaje
		];
    }

	public function estadoOperacionFallidaImport($dta = null)
	{
		$data = $dta == null ? "Error: Operación fallida" : $dta;
		return [
			'code' => 401,
			'message' => 'El arhivo que se importó contiene errores',
            'data' => $data
		];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta parametros incorrectos al enviar al servidor
	|---------------------------------------------------------------------------------------
	*/
	public function estadoParametrosIncorrectos($msj = null)
	{
        $mensaje = $msj == null ? "Error: Operación fallida" : $msj;
		return [
			'code' => 504,
			'message' =>  $mensaje
		];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta acceso denegado para el acceso a ciertos modulos o servicios
	|---------------------------------------------------------------------------------------
	*/
    public function accesoDenegado($msj = null)
	{
		$mensaje = $msj == null ? "Acceso no autorizado. La key no es correcta." : $msj;
		return [
			'code' => 401,
			'message' => $mensaje
		];
	}

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta acceso no autorizado 403 para permisos de API
	|---------------------------------------------------------------------------------------
	*/
	public function noPermitido($msj = null)
	{
		$mensaje = $msj == null ? "Acceso no autorizado." : $msj;
		return response()->json(['message' => $mensaje, 'code' => '403'], 403);
	}



    /*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta para cargas masivas
	|---------------------------------------------------------------------------------------
	*/
    public function enProceso($msj = null, $data = [])
    {
        $mensaje = $msj == null ? "Procesando petición" : $msj;
        return ['message' => $mensaje, 'code' => 202, 'data' => $data];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta para items de salida formato SRT
	|---------------------------------------------------------------------------------------
	*/

	public function estadoResponseItemsFmms($msj = null, $data = [])
    {
        $format_srt = $msj == null ? "Procesando petición" : $msj;
        return ['format_srt' => $format_srt, 'code' => 200, 'data' => $data];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta para productos que están en inventario o FMMI
	|---------------------------------------------------------------------------------------
	*/

	public function estadoRespuestaProdFMMI($message = null, $data = [])
    {
        $message= "El producto se encuentra en inventario o en un formulario";
        return ['message' => $message, 'code' => 400, 'data' => $data];
    }

	/*
	|---------------------------------------------------------------------------------------
	| Estado de respuesta OK para tipos de documento en configuracion
	|---------------------------------------------------------------------------------------
	*/
	public function estadoExitosoTD($data = null, $data_set = null)
	{
		$mensaje= "Procesado con éxito";
		return [
			'code' => 200,
			'message' => $mensaje,
            'data' => $data,
			'data_set' => $data_set
		];
    }
}
