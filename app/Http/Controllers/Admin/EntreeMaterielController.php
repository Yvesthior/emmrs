<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntreeMaterielRequest;
use App\Http\Requests\StoreEntreeMaterielRequest;
use App\Http\Requests\UpdateEntreeMaterielRequest;
use Gate;
use Illuminate\Http\Request;
use App\Models\Fabriquant;
use App\Models\Materiel;
use App\Models\RepresentantsLocaux;
use App\Models\Site;
use Symfony\Component\HttpFoundation\Response;

class EntreeMaterielController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entree_materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $representant_locals = RepresentantsLocaux::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.entreeMateriels.index', compact('fabriquants', 'representant_locals', 'provenances', 'destinations'));
    
    }

    public function create()
    {
        abort_if(Gate::denies('entree_materiel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entreeMateriels.create');
    }

    public function store(StoreEntreeMaterielRequest $request)
    {
        $entreeMateriel = EntreeMateriel::create($request->all());

        return redirect()->route('admin.entree-materiels.index');
    }

    public function edit(EntreeMateriel $entreeMateriel)
    {
        abort_if(Gate::denies('entree_materiel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entreeMateriels.edit', compact('entreeMateriel'));
    }

    public function update(UpdateEntreeMaterielRequest $request, EntreeMateriel $entreeMateriel)
    {
        $entreeMateriel->update($request->all());

        return redirect()->route('admin.entree-materiels.index');
    }

    public function show(EntreeMateriel $entreeMateriel)
    {
        abort_if(Gate::denies('entree_materiel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entreeMateriels.show', compact('entreeMateriel'));
    }

    public function destroy(EntreeMateriel $entreeMateriel)
    {
        abort_if(Gate::denies('entree_materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreeMateriel->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntreeMaterielRequest $request)
    {
        EntreeMateriel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
