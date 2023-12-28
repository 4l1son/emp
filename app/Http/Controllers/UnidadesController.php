<?php

namespace App\Http\Controllers;

use App\Http\Services\UnidadesService;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    protected $unidadesService;

    public function __construct(UnidadesService $unidadesService)
    {
        $this->unidadesService = $unidadesService;
    }

    public function store(Request $request)
    {
        return $this->unidadesService->store($request);
    }

    public function index()
    {
        return $this->unidadesService->index();
    }

    public function show($id)
    {
        return $this->unidadesService->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->unidadesService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->unidadesService->destroy($id);
    }
}
