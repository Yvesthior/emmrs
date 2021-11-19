<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRepresentantsLocauxRequest;
use App\Http\Requests\StoreRepresentantsLocauxRequest;
use App\Http\Requests\UpdateRepresentantsLocauxRequest;
use App\Models\RepresentantsLocaux;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepresentantsLocauxController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('representants_locaux_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $representantsLocauxes = RepresentantsLocaux::all();

        return view('admin.representantsLocauxes.index', compact('representantsLocauxes'));
    }

    public function create()
    {
        abort_if(Gate::denies('representants_locaux_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.representantsLocauxes.create');
    }

    public function store(StoreRepresentantsLocauxRequest $request)
    {
        $representantsLocaux = RepresentantsLocaux::create($request->all());

        return redirect()->route('admin.representants-locauxes.index');
    }

    public function edit(RepresentantsLocaux $representantsLocaux)
    {
        abort_if(Gate::denies('representants_locaux_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.representantsLocauxes.edit', compact('representantsLocaux'));
    }

    public function update(UpdateRepresentantsLocauxRequest $request, RepresentantsLocaux $representantsLocaux)
    {
        $representantsLocaux->update($request->all());

        return redirect()->route('admin.representants-locauxes.index');
    }

    public function show(RepresentantsLocaux $representantsLocaux)
    {
        abort_if(Gate::denies('representants_locaux_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.representantsLocauxes.show', compact('representantsLocaux'));
    }

    public function destroy(RepresentantsLocaux $representantsLocaux)
    {
        abort_if(Gate::denies('representants_locaux_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $representantsLocaux->delete();

        return back();
    }

    public function massDestroy(MassDestroyRepresentantsLocauxRequest $request)
    {
        RepresentantsLocaux::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
