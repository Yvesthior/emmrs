<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Http\Resources\Admin\FournisseurResource;
use App\Models\Fournisseur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FournisseursApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fournisseur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FournisseurResource(Fournisseur::all());
    }

    public function store(StoreFournisseurRequest $request)
    {
        $fournisseur = Fournisseur::create($request->all());

        return (new FournisseurResource($fournisseur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Fournisseur $fournisseur)
    {
        abort_if(Gate::denies('fournisseur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FournisseurResource($fournisseur);
    }

    public function update(UpdateFournisseurRequest $request, Fournisseur $fournisseur)
    {
        $fournisseur->update($request->all());

        return (new FournisseurResource($fournisseur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Fournisseur $fournisseur)
    {
        abort_if(Gate::denies('fournisseur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
