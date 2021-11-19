<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;
use App\Http\Resources\Admin\ReferenceResource;
use App\Models\Reference;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferencesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reference_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenceResource(Reference::all());
    }

    public function store(StoreReferenceRequest $request)
    {
        $reference = Reference::create($request->all());

        return (new ReferenceResource($reference))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reference $reference)
    {
        abort_if(Gate::denies('reference_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenceResource($reference);
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        $reference->update($request->all());

        return (new ReferenceResource($reference))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reference $reference)
    {
        abort_if(Gate::denies('reference_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reference->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
