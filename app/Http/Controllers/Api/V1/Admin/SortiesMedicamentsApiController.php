<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSortiesMedicamentRequest;
use App\Http\Requests\UpdateSortiesMedicamentRequest;
use App\Http\Resources\Admin\SortiesMedicamentResource;
use App\Models\SortiesMedicament;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SortiesMedicamentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sorties_medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SortiesMedicamentResource(SortiesMedicament::with(['medicament', 'destination'])->get());
    }

    public function store(StoreSortiesMedicamentRequest $request)
    {
        $sortiesMedicament = SortiesMedicament::create($request->all());

        return (new SortiesMedicamentResource($sortiesMedicament))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SortiesMedicament $sortiesMedicament)
    {
        abort_if(Gate::denies('sorties_medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SortiesMedicamentResource($sortiesMedicament->load(['medicament', 'destination']));
    }

    public function update(UpdateSortiesMedicamentRequest $request, SortiesMedicament $sortiesMedicament)
    {
        $sortiesMedicament->update($request->all());

        return (new SortiesMedicamentResource($sortiesMedicament))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SortiesMedicament $sortiesMedicament)
    {
        abort_if(Gate::denies('sorties_medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sortiesMedicament->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
