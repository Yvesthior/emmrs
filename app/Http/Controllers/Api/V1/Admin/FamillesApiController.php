<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilleRequest;
use App\Http\Requests\UpdateFamilleRequest;
use App\Http\Resources\Admin\FamilleResource;
use App\Models\Famille;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FamillesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('famille_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FamilleResource(Famille::all());
    }

    public function store(StoreFamilleRequest $request)
    {
        $famille = Famille::create($request->all());

        return (new FamilleResource($famille))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Famille $famille)
    {
        abort_if(Gate::denies('famille_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FamilleResource($famille);
    }

    public function update(UpdateFamilleRequest $request, Famille $famille)
    {
        $famille->update($request->all());

        return (new FamilleResource($famille))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Famille $famille)
    {
        abort_if(Gate::denies('famille_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $famille->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
