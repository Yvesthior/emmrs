<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFabriquantRequest;
use App\Http\Requests\UpdateFabriquantRequest;
use App\Http\Resources\Admin\FabriquantResource;
use App\Models\Fabriquant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FabriquantsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fabriquant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FabriquantResource(Fabriquant::all());
    }

    public function store(StoreFabriquantRequest $request)
    {
        $fabriquant = Fabriquant::create($request->all());

        return (new FabriquantResource($fabriquant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Fabriquant $fabriquant)
    {
        abort_if(Gate::denies('fabriquant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FabriquantResource($fabriquant);
    }

    public function update(UpdateFabriquantRequest $request, Fabriquant $fabriquant)
    {
        $fabriquant->update($request->all());

        return (new FabriquantResource($fabriquant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Fabriquant $fabriquant)
    {
        abort_if(Gate::denies('fabriquant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
