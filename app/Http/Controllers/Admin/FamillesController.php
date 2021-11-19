<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFamilleRequest;
use App\Http\Requests\StoreFamilleRequest;
use App\Http\Requests\UpdateFamilleRequest;
use App\Models\Famille;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FamillesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('famille_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familles = Famille::all();

        return view('admin.familles.index', compact('familles'));
    }

    public function create()
    {
        abort_if(Gate::denies('famille_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.familles.create');
    }

    public function store(StoreFamilleRequest $request)
    {
        $famille = Famille::create($request->all());

        return redirect()->route('admin.familles.index');
    }

    public function edit(Famille $famille)
    {
        abort_if(Gate::denies('famille_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.familles.edit', compact('famille'));
    }

    public function update(UpdateFamilleRequest $request, Famille $famille)
    {
        $famille->update($request->all());

        return redirect()->route('admin.familles.index');
    }

    public function show(Famille $famille)
    {
        abort_if(Gate::denies('famille_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.familles.show', compact('famille'));
    }

    public function destroy(Famille $famille)
    {
        abort_if(Gate::denies('famille_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $famille->delete();

        return back();
    }

    public function massDestroy(MassDestroyFamilleRequest $request)
    {
        Famille::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
