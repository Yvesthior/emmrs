<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEntreesMedicamentRequest;
use App\Http\Requests\UpdateEntreesMedicamentRequest;
use App\Http\Resources\Admin\EntreesMedicamentResource;
use App\Models\EntreesMedicament;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntreesMedicamentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entrees_medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EntreesMedicamentResource(EntreesMedicament::with(['medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination'])->get());
    }

    public function store(StoreEntreesMedicamentRequest $request)
    {
        $entreesMedicament = EntreesMedicament::create($request->all());

        return (new EntreesMedicamentResource($entreesMedicament))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EntreesMedicament $entreesMedicament)
    {
        abort_if(Gate::denies('entrees_medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EntreesMedicamentResource($entreesMedicament->load(['medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination']));
    }

    public function update(UpdateEntreesMedicamentRequest $request, EntreesMedicament $entreesMedicament)
    {
        $entreesMedicament->update($request->all());

        return (new EntreesMedicamentResource($entreesMedicament))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EntreesMedicament $entreesMedicament)
    {
        abort_if(Gate::denies('entrees_medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreesMedicament->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
