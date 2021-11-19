<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNouvelleEntreeRequest;
use App\Http\Requests\StoreNouvelleEntreeRequest;
use App\Http\Requests\UpdateNouvelleEntreeRequest;
use Gate;
use Illuminate\Http\Request;
use App\Models\ClasseTherapeutique;
use App\Models\Conditionnement;
use App\Models\Dosage;
use App\Models\Fabriquant;
use App\Models\Famille;
use App\Models\Forme;
use App\Models\Formule;
use App\Models\Fournisseur;
use App\Models\Medicament;
use App\Models\Reference;
use App\Models\Site;
use Symfony\Component\HttpFoundation\Response;

class NouvelleEntreeController extends Controller
{
    public function index()
    {

        abort_if(Gate::denies('medicament_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formes = Forme::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dosages = Dosage::pluck('quantite', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conditionnements = Conditionnement::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classe_therapeutiques = ClasseTherapeutique::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formules = Formule::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $familles = Famille::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fournisseurs = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $references = Reference::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('admin.nouvelleEntrees.index', compact('formes', 'dosages', 'conditionnements', 'classe_therapeutiques', 'fabriquants', 'formules', 'familles', 'provenances', 'fournisseurs', 'destinations', 'references'));
    }

    public function create()
    {
        abort_if(Gate::denies('nouvelle_entree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nouvelleEntrees.create');
    }

    public function store(StoreNouvelleEntreeRequest $request)
    {
        $nouvelleEntree = NouvelleEntree::create($request->all());

        return redirect()->route('admin.nouvelle-entrees.index');
    }

    public function edit(NouvelleEntree $nouvelleEntree)
    {
        abort_if(Gate::denies('nouvelle_entree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nouvelleEntrees.edit', compact('nouvelleEntree'));
    }

    public function update(UpdateNouvelleEntreeRequest $request, NouvelleEntree $nouvelleEntree)
    {
        $nouvelleEntree->update($request->all());

        return redirect()->route('admin.nouvelle-entrees.index');
    }

    public function show(NouvelleEntree $nouvelleEntree)
    {
        abort_if(Gate::denies('nouvelle_entree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nouvelleEntrees.show', compact('nouvelleEntree'));
    }

    public function destroy(NouvelleEntree $nouvelleEntree)
    {
        abort_if(Gate::denies('nouvelle_entree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nouvelleEntree->delete();

        return back();
    }

    public function massDestroy(MassDestroyNouvelleEntreeRequest $request)
    {
        NouvelleEntree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
