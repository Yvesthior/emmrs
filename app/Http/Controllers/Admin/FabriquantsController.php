<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFabriquantRequest;
use App\Http\Requests\StoreFabriquantRequest;
use App\Http\Requests\UpdateFabriquantRequest;
use App\Models\Fabriquant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FabriquantsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fabriquant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquants = Fabriquant::all();

        return view('admin.fabriquants.index', compact('fabriquants'));
    }

    public function create()
    {
        abort_if(Gate::denies('fabriquant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fabriquants.create');
    }

    public function store(StoreFabriquantRequest $request)
    {
        $fabriquant = Fabriquant::create($request->all());

        return redirect()->route('admin.fabriquants.index');
    }

    public function edit(Fabriquant $fabriquant)
    {
        abort_if(Gate::denies('fabriquant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fabriquants.edit', compact('fabriquant'));
    }

    public function update(UpdateFabriquantRequest $request, Fabriquant $fabriquant)
    {
        $fabriquant->update($request->all());

        return redirect()->route('admin.fabriquants.index');
    }

    public function show(Fabriquant $fabriquant)
    {
        abort_if(Gate::denies('fabriquant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fabriquants.show', compact('fabriquant'));
    }

    public function destroy(Fabriquant $fabriquant)
    {
        abort_if(Gate::denies('fabriquant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquant->delete();

        return back();
    }

    public function massDestroy(MassDestroyFabriquantRequest $request)
    {
        Fabriquant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
