<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormeRequest;
use App\Http\Requests\StoreFormeRequest;
use App\Http\Requests\UpdateFormeRequest;
use App\Models\Forme;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('forme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formes = Forme::all();

        return view('admin.formes.index', compact('formes'));
    }

    public function create()
    {
        abort_if(Gate::denies('forme_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formes.create');
    }

    public function store(StoreFormeRequest $request)
    {
        $forme = Forme::create($request->all());

        return redirect()->route('admin.formes.index');
    }

    public function edit(Forme $forme)
    {
        abort_if(Gate::denies('forme_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formes.edit', compact('forme'));
    }

    public function update(UpdateFormeRequest $request, Forme $forme)
    {
        $forme->update($request->all());

        return redirect()->route('admin.formes.index');
    }

    public function show(Forme $forme)
    {
        abort_if(Gate::denies('forme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formes.show', compact('forme'));
    }

    public function destroy(Forme $forme)
    {
        abort_if(Gate::denies('forme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forme->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormeRequest $request)
    {
        Forme::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
