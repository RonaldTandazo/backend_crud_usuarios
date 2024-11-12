<?php

namespace App\Services;

interface IService
{
    public function index();
    public function paginate($per_page, $page);
    public function getById($id);
    public function store($input);
    public function update($input, $id);
    public function destroy($id, $usuario_id);
}
