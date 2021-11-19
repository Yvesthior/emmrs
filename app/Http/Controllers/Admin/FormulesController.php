<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormuleRequest;
use App\Http\Requests\StoreFormuleRequest;
use App\Http\Requests\UpdateFormuleRequest;
use App\Models\Formule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormulesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('formule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formules = Formule::all();

        return view('admin.formules.index', compact('formules'));
    }

    public function create()
    {
        abort_if(Gate::denies('formule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formules.create');
    }

    public function store(StoreFormuleRequest $request)
    {
        $formule = Formule::create($request->all());

        return redirect()->route('admin.formules.index');
    }

    public function edit(Formule $formule)
    {
        abort_if(Gate::denies('formule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formules.edit', compact('formule'));
    }

    public function update(UpdateFormuleRequest $request, Formule $formule)
    {
        $formule->update($request->all());

        return redirect()->route('admin.formules.index');
    }

    public function show(Formule $formule)
    {
        abort_if(Gate::denies('formule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formules.show', compact('formule'));
    }

    public function destroy(Formule $formule)
    {
        abort_if(Gate::denies('formule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formule->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormuleRequest $request)
    {
        Formule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
