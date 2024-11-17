<?php

namespace App\Services;

use App\Models\Usuarios;
use App\Services\IService;
use App\Services\Response;
use Exception;
use Illuminate\Support\Facades\Log;

class UsuariosService implements IService
{
    public function index() {}

    public function getById($id) {}

    public function store($input){
        $response = new Response();
        try{
            $usuario = new Usuarios();
            $usuario->usuario = $input['usuario'];
            $usuario->email = $input['email'];
            $usuario->primerNombre = $input['primer_nombre'];
            $usuario->segundoNombre = $input['segundo_nombre'];
            $usuario->primerApellido = $input['primer_apellido'];
            $usuario->segundoApellido = $input['segundo_apellido'];
            $usuario->idDepartamento = $input['id_departamento'];
            $usuario->idCargo = $input['id_cargo'];
            $usuario->save();

            $response->set_data($usuario);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }

    public function destroy($id, $input) {
        $response = new Response();
        try{
            $usuario = Usuarios::where('id', $id)->first();
            if($usuario){
                $usuario->activo = false;
                $usuario->save();
            }

            $response->set_data($usuario);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }

    public function update($id, $input) {
        $response = new Response();
        try{
            $usuario = Usuarios::where('id', $id)->first();

            if($usuario){
                $usuario->usuario = isset($input['usuario']) ? $input['usuario']:$usuario->usuario;
                $usuario->email = isset($input['email']) ? $input['email']:$usuario->email;
                $usuario->primerNombre = isset($input['primer_nombre']) ? $input['primer_nombre']:$usuario->primerNombre;
                $usuario->segundoNombre = isset($input['segundo_nombre']) ? $input['segundo_nombre']:$usuario->segundoNombre;
                $usuario->primerApellido = isset($input['primer_apellido']) ? $input['primer_apellido']:$usuario->primerApellido;
                $usuario->segundoApellido = isset($input['segundo_apellido']) ? $input['segundo_apellido']:$usuario->segundoApellido;
                $usuario->idDepartamento = isset($input['id_departamento']) ? $input['id_departamento']:$usuario->idDepartamento;
                $usuario->idCargo = isset($input['id_cargo']) ? $input['id_cargo']:$usuario->idCargo;
                $usuario->save();
            }

            $response->set_data($usuario);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }

    public function paginate($perPage, $columns = ['*'], $pageName = 'page', $page = null) {}

    public function get_usuarios($id_departamento, $id_cargo, $page, $perPage){
        $response = new Response();
        try{
            $usuarios = Usuarios::select(
                'usuarios.id', 'usuarios.usuario', 'usuarios.primerNombre as primer_nombre', 'usuarios.segundoNombre as segundo_nombre',
                'usuarios.primerApellido as primer_apellido', 'usuarios.segundoApellido as segundo_apellido', 'usuarios.email',
                'departamentos.id as id_departamento', 'departamentos.nombre as departamento', 'cargos.id as id_cargo', 'cargos.nombre as cargo'
            )
            ->join('departamentos', function($join) {
                $join->on('usuarios.idDepartamento', '=', 'departamentos.id')
                     ->where('departamentos.activo', true);
            })
            ->join('cargos', function($join) {
                $join->on('usuarios.idCargo', '=', 'cargos.id')
                     ->where('cargos.activo', true);
            })
            ->when($id_departamento != 0, function($query) use($id_departamento) {
                $query->where('usuarios.idDepartamento', $id_departamento);
            })
            ->when($id_cargo != 0, function($query) use($id_cargo) {
                $query->where('usuarios.idCargo', $id_cargo);
            })
            ->where('usuarios.activo', true)
            ->paginate($perPage, ['*'], 'page', $page);

            $response->set_data($usuarios);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }

    public function verificar($email){
        $response = new Response();
        try{
            $email = trim(mb_strtolower($email));
            $usuario = Usuarios::whereRaw("LOWER(LTRIM(RTRIM(usuarios.email))) = ?", [$email])->where('activo', true)->first();

            $response->set_data($usuario);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }
}
