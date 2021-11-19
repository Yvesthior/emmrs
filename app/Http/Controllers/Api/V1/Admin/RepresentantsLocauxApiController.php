<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepresentantsLocauxRequest;
use App\Http\Requests\UpdateRepresentantsLocauxRequest;
use App\Http\Resources\Admin\RepresentantsLocauxResource;
use App\Models\RepresentantsLocaux;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepresentantsLocauxApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('representants_locaux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RepresentantsLocauxResource(RepresentantsLocaux::all());
    }

    public function store(StoreRepresentantsLocauxRequest $request)
    {
        $representantsLocaux = RepresentantsLocaux::create($request->all());

        return (new RepresentantsLocauxResource($representantsLocaux))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RepresentantsLocaux $representantsLocaux)
    {
        abort_if(Gate::denies('representants_locaux_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RepresentantsLocauxResource($representantsLocaux);
    }

    public function update(UpdateRepresentantsLocauxRequest $request, RepresentantsLocaux $representantsLocaux)
    {
        $representantsLocaux->update($request->all());

        return (new RepresentantsLocauxResource($representantsLocaux))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RepresentantsLocaux $representantsLocaux)
    {
        abort_if(Gate::denies('representants_locaux_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $representantsLocaux->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
