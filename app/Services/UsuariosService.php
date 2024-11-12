<?php

namespace App\Services;

use App\Models\Usuarios;
use App\Services\IService;
use App\Services\Response;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UsuariosService implements IService
{
    public function index() {}

    public function getById($id) {}

    public function store($input){}

    public function destroy($id, $input) {}

    public function update($id, $input) {}

    public function paginate($perPage, $columns = ['*'], $pageName = 'page', $page = null) {}

    public function get_usuarios($request){
        $response = new Response();
        try{
            $usuarios = Usuarios::select(
                'usuarios.id', 'usuarios.primerNombre as primer_nombre', 'usuarios.segundoNombre as segundo_nombre',
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
            ->when(!empty($request['id_departamento']), function($query) use($request) {
                $query->where('idDepartamento', $request['id_departamento']);
            })
            ->when(!empty($request['id_cargo']), function($query) use($request) {
                $query->where('idCargo', $request['id_cargo']);
            })
            ->where('usuarios.activo', true)
            ->get();

            $response->set_data($usuarios);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }
}
