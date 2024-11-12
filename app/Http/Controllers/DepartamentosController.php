<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\DepartamentosService;

class DepartamentosController extends Controller
{
    protected $serviceDepartamentos;

    public function __construct(){
        $this->serviceDepartamentos = new DepartamentosService();
    }

    public function get_all_departamentos(){
        try{
            $departamentos = $this->serviceDepartamentos->index();
            if (!$departamentos->ok) {
                throw new Exception($departamentos->msgerror());
            }

            $data = $departamentos->data;

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
