<?php

namespace App\Services;

use App\Models\Cargos;
use App\Services\IService;
use App\Services\Response;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CargosService implements IService
{
    public function index() {
        $response = new Response();
        try{
            $cargos = Cargos::select('id', 'nombre')
            ->where('activo', true)
            ->get();

            $response->set_data($cargos);
        }catch(Exception $e){
            Log::error("ERROR " . __FILE__ . ":" . __FUNCTION__ . " -> " . $e);
            $response->set_ok(false);
            $response->set_msgerror($e->getMessage());
            $response->set_error($e->getCode());
        }

        return $response;
    }

    public function getById($id) {}

    public function store($input){}

    public function destroy($id, $input) {}

    public function update($id, $input) {}

    public function paginate($perPage, $columns = ['*'], $pageName = 'page', $page = null) {}
}
