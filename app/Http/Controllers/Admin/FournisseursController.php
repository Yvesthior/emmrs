<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFournisseurRequest;
use App\Http\Requests\StoreFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Models\Fournisseur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FournisseursController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fournisseur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseurs = Fournisseur::all();

        return view('admin.fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        abort_if(Gate::denies('fournisseur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fournisseurs.create');
    }

    public function store(StoreFournisseurRequest $request)
    {
        $fournisseur = Fournisseur::create($request->all());

        return redirect()->route('admin.fournisseurs.index');
    }

    public function edit(Fournisseur $fournisseur)
    {
        abort_if(Gate::denies('fournisseur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fournisseurs.edit', compact('fournisseur'));
    }

    public function update(UpdateFournisseurRequest $request, Fournisseur $fournisseur)
    {
        $fournisseur->update($request->all());

        return redirect()->route('admin.fournisseurs.index');
    }

    public function show(Fournisseur $fournisseur)
    {
        abort_if(Gate::denies('fournisseur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fournisseurs.show', compact('fournisseur'));
    }

    public function destroy(Fournisseur $fournisseur)
    {
        abort_if(Gate::denies('fournisseur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseur->delete();

        return back();
    }

    public function massDestroy(MassDestroyFournisseurRequest $request)
    {
        Fournisseur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
