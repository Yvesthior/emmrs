<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormeRequest;
use App\Http\Requests\UpdateFormeRequest;
use App\Http\Resources\Admin\FormeResource;
use App\Models\Forme;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('forme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormeResource(Forme::all());
    }

    public function store(StoreFormeRequest $request)
    {
        $forme = Forme::create($request->all());

        return (new FormeResource($forme))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Forme $forme)
    {
        abort_if(Gate::denies('forme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormeResource($forme);
    }

    public function update(UpdateFormeRequest $request, Forme $forme)
    {
        $forme->update($request->all());

        return (new FormeResource($forme))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Forme $forme)
    {
        abort_if(Gate::denies('forme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forme->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
