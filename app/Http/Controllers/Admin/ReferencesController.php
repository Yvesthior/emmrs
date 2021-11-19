<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReferenceRequest;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;
use App\Models\Reference;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reference_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $references = Reference::all();

        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        abort_if(Gate::denies('reference_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.references.create');
    }

    public function store(StoreReferenceRequest $request)
    {
        $reference = Reference::create($request->all());

        return redirect()->route('admin.references.index');
    }

    public function edit(Reference $reference)
    {
        abort_if(Gate::denies('reference_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.references.edit', compact('reference'));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        $reference->update($request->all());

        return redirect()->route('admin.references.index');
    }

    public function show(Reference $reference)
    {
        abort_if(Gate::denies('reference_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.references.show', compact('reference'));
    }

    public function destroy(Reference $reference)
    {
        abort_if(Gate::denies('reference_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reference->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferenceRequest $request)
    {
        Reference::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
