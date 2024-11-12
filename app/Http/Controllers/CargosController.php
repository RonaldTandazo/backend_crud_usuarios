<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\CargosService;

class CargosController extends Controller
{
    protected $serviceCargos;

    public function __construct(){
        $this->serviceCargos = new CargosService();
    }

    public function get_all_cargos(){
        try{
            $cargos = $this->serviceCargos->index();
            if (!$cargos->ok) {
                throw new Exception($cargos->msgerror());
            }

            $data = $cargos->data;

            return response()->json([
                'ok' => true,
                'data' => $data,
              ], 200);
        } catch (Exception $e) {
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            return response()->json([
                'ok' => false,
                'text' => ['message' => $e->getMessage()]
            ], 200);
        }
    }
}
