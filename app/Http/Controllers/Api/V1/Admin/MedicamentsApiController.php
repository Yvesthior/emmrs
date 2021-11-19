<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicamentRequest;
use App\Http\Requests\UpdateMedicamentRequest;
use App\Http\Resources\Admin\MedicamentResource;
use App\Models\Medicament;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicamentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MedicamentResource(Medicament::with(['forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference'])->get());
    }

    public function store(StoreMedicamentRequest $request)
    {
        $medicament = Medicament::create($request->all());

        return (new MedicamentResource($medicament))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MedicamentResource($medicament->load(['forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference']));
    }

    public function update(UpdateMedicamentRequest $request, Medicament $medicament)
    {
        $medicament->update($request->all());

        return (new MedicamentResource($medicament))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicament->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
