<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Http\Resources\Admin\DestinationResource;
use App\Models\Destination;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DestinationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('destination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DestinationResource(Destination::all());
    }

    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->all());

        return (new DestinationResource($destination))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Destination $destination)
    {
        abort_if(Gate::denies('destination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DestinationResource($destination);
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->all());

        return (new DestinationResource($destination))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Destination $destination)
    {
        abort_if(Gate::denies('destination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destination->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
