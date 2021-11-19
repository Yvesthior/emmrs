<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSortyRequest;
use App\Http\Requests\UpdateSortyRequest;
use App\Http\Resources\Admin\SortyResource;
use App\Models\Sorty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SortiesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sorty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SortyResource(Sorty::with(['equipement', 'destination'])->get());
    }

    public function store(StoreSortyRequest $request)
    {
        $sorty = Sorty::create($request->all());

        return (new SortyResource($sorty))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sorty $sorty)
    {
        abort_if(Gate::denies('sorty_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SortyResource($sorty->load(['equipement', 'destination']));
    }

    public function update(UpdateSortyRequest $request, Sorty $sorty)
    {
        $sorty->update($request->all());

        return (new SortyResource($sorty))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sorty $sorty)
    {
        abort_if(Gate::denies('sorty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sorty->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
