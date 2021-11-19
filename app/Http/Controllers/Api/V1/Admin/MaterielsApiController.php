<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaterielRequest;
use App\Http\Requests\UpdateMaterielRequest;
use App\Http\Resources\Admin\MaterielResource;
use App\Models\Materiel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterielsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterielResource(Materiel::with(['fabriquant', 'representant_local', 'provenance', 'destination'])->get());
    }

    public function store(StoreMaterielRequest $request)
    {
        $materiel = Materiel::create($request->all());

        return (new MaterielResource($materiel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterielResource($materiel->load(['fabriquant', 'representant_local', 'provenance', 'destination']));
    }

    public function update(UpdateMaterielRequest $request, Materiel $materiel)
    {
        $materiel->update($request->all());

        return (new MaterielResource($materiel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
