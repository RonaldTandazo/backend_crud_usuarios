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

    public function get_usuarios($id_departamento, $id_cargo, $page = 1, $perPage = 10){
        try{
            $usuarios = $this->serviceUsuarios->get_usuarios($id_departamento, $id_cargo, $page, $perPage);
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
            $message = null;

            $verificar = $this->serviceUsuarios->verificar($request['email']);
            if (!$verificar->ok) {
                throw new Exception($verificar->msgerror());
            }

            $verificar = $verificar->data;

            if($verificar){
                $message = 'El usuario ya existe';
            }else{
                $store = $this->serviceUsuarios->store($request);
                if (!$store->ok) {
                    throw new Exception($store->msgerror());
                }

                $message = 'Usuario Registrado con Éxito';
            }

            return response()->json([
                'ok' => true,
                'data' => $message,
              ], 200);
        } catch (Exception $e) {
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            return response()->json([
                'ok' => false,
                'text' => ['message' => $e->getMessage()]
            ], 200);
        }
    }

    public function update(Request $request, $id_usuario){
        try{
            $update = $this->serviceUsuarios->update($id_usuario, $request);
            if (!$update->ok) {
                throw new Exception($update->msgerror());
            }

            $message = 'Usuario Actualizado con Éxito';

            return response()->json([
                'ok' => true,
                'data' => $message,
              ], 200);
        } catch (Exception $e) {
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            return response()->json([
                'ok' => false,
                'text' => ['message' => $e->getMessage()]
            ], 200);
        }
    }

    public function delete(Request $request, $id_usuario){
        try{

            $delete = $this->serviceUsuarios->destroy($id_usuario, $request);
            if (!$delete->ok) {
                throw new Exception($delete->msgerror());
            }

            $message = 'Usuario Eliminado con Éxito';

            return response()->json([
                'ok' => true,
                'data' => $message,
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
