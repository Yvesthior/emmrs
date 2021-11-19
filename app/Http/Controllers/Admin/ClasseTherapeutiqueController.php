<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClasseTherapeutiqueRequest;
use App\Http\Requests\StoreClasseTherapeutiqueRequest;
use App\Http\Requests\UpdateClasseTherapeutiqueRequest;
use App\Models\ClasseTherapeutique;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClasseTherapeutiqueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('classe_therapeutique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classeTherapeutiques = ClasseTherapeutique::all();

        return view('admin.classeTherapeutiques.index', compact('classeTherapeutiques'));
    }

    public function create()
    {
        abort_if(Gate::denies('classe_therapeutique_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classeTherapeutiques.create');
    }

    public function store(StoreClasseTherapeutiqueRequest $request)
    {
        $classeTherapeutique = ClasseTherapeutique::create($request->all());

        return redirect()->route('admin.classe-therapeutiques.index');
    }

    public function edit(ClasseTherapeutique $classeTherapeutique)
    {
        abort_if(Gate::denies('classe_therapeutique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classeTherapeutiques.edit', compact('classeTherapeutique'));
    }

    public function update(UpdateClasseTherapeutiqueRequest $request, ClasseTherapeutique $classeTherapeutique)
    {
        $classeTherapeutique->update($request->all());

        return redirect()->route('admin.classe-therapeutiques.index');
    }

    public function show(ClasseTherapeutique $classeTherapeutique)
    {
        abort_if(Gate::denies('classe_therapeutique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classeTherapeutiques.show', compact('classeTherapeutique'));
    }

    public function destroy(ClasseTherapeutique $classeTherapeutique)
    {
        abort_if(Gate::denies('classe_therapeutique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classeTherapeutique->delete();

        return back();
    }

    public function massDestroy(MassDestroyClasseTherapeutiqueRequest $request)
    {
        ClasseTherapeutique::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
