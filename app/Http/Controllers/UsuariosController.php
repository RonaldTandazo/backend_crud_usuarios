<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\UsuariosService;

class UsuariosController extends Controller
{
    protected $serviceUsuarios;

    public function __construct(){
        $this->serviceUsuarios = new UsuariosService();
    }

    public function get_usuarios(Request $request){
        try{
            $usuarios = $this->serviceUsuarios->get_usuarios($request);
            if (!$usuarios->ok) {
                throw new Exception($usuarios->msgerror());
            }

            $data = $usuarios->data;

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

    public function store(Request $request){
        try{
            log::alert($request);

            return response()->json([
                'ok' => true,
                'data' => null,
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
