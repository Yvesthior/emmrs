<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncrementationMaterielRequest;
use App\Http\Requests\UpdateIncrementationMaterielRequest;
use App\Http\Resources\Admin\IncrementationMaterielResource;
use App\Models\IncrementationMateriel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncrementationMaterielsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('incrementation_materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncrementationMaterielResource(IncrementationMateriel::with(['materiel', 'provenance', 'fabriquant', 'destination'])->get());
    }

    public function store(StoreIncrementationMaterielRequest $request)
    {
        $incrementationMateriel = IncrementationMateriel::create($request->all());

        return (new IncrementationMaterielResource($incrementationMateriel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IncrementationMateriel $incrementationMateriel)
    {
        abort_if(Gate::denies('incrementation_materiel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IncrementationMaterielResource($incrementationMateriel->load(['materiel', 'provenance', 'fabriquant', 'destination']));
    }

    public function update(UpdateIncrementationMaterielRequest $request, IncrementationMateriel $incrementationMateriel)
    {
        $incrementationMateriel->update($request->all());

        return (new IncrementationMaterielResource($incrementationMateriel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IncrementationMateriel $incrementationMateriel)
    {
        abort_if(Gate::denies('incrementation_materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incrementationMateriel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
