<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDosageRequest;
use App\Http\Requests\UpdateDosageRequest;
use App\Http\Resources\Admin\DosageResource;
use App\Models\Dosage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DosageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dosage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DosageResource(Dosage::all());
    }

    public function store(StoreDosageRequest $request)
    {
        $dosage = Dosage::create($request->all());

        return (new DosageResource($dosage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Dosage $dosage)
    {
        abort_if(Gate::denies('dosage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DosageResource($dosage);
    }

    public function update(UpdateDosageRequest $request, Dosage $dosage)
    {
        $dosage->update($request->all());

        return (new DosageResource($dosage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Dosage $dosage)
    {
        abort_if(Gate::denies('dosage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
