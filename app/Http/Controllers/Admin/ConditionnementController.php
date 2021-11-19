<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConditionnementRequest;
use App\Http\Requests\StoreConditionnementRequest;
use App\Http\Requests\UpdateConditionnementRequest;
use App\Models\Conditionnement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConditionnementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('conditionnement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conditionnements = Conditionnement::all();

        return view('admin.conditionnements.index', compact('conditionnements'));
    }

    public function create()
    {
        abort_if(Gate::denies('conditionnement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditionnements.create');
    }

    public function store(StoreConditionnementRequest $request)
    {
        $conditionnement = Conditionnement::create($request->all());

        return redirect()->route('admin.conditionnements.index');
    }

    public function edit(Conditionnement $conditionnement)
    {
        abort_if(Gate::denies('conditionnement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditionnements.edit', compact('conditionnement'));
    }

    public function update(UpdateConditionnementRequest $request, Conditionnement $conditionnement)
    {
        $conditionnement->update($request->all());

        return redirect()->route('admin.conditionnements.index');
    }

    public function show(Conditionnement $conditionnement)
    {
        abort_if(Gate::denies('conditionnement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditionnements.show', compact('conditionnement'));
    }

    public function destroy(Conditionnement $conditionnement)
    {
        abort_if(Gate::denies('conditionnement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conditionnement->delete();

        return back();
    }

    public function massDestroy(MassDestroyConditionnementRequest $request)
    {
        Conditionnement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
