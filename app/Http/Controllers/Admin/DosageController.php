<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDosageRequest;
use App\Http\Requests\StoreDosageRequest;
use App\Http\Requests\UpdateDosageRequest;
use App\Models\Dosage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DosageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dosage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosages = Dosage::all();

        return view('admin.dosages.index', compact('dosages'));
    }

    public function create()
    {
        abort_if(Gate::denies('dosage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dosages.create');
    }

    public function store(StoreDosageRequest $request)
    {
        $dosage = Dosage::create($request->all());

        return redirect()->route('admin.dosages.index');
    }

    public function edit(Dosage $dosage)
    {
        abort_if(Gate::denies('dosage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dosages.edit', compact('dosage'));
    }

    public function update(UpdateDosageRequest $request, Dosage $dosage)
    {
        $dosage->update($request->all());

        return redirect()->route('admin.dosages.index');
    }

    public function show(Dosage $dosage)
    {
        abort_if(Gate::denies('dosage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dosages.show', compact('dosage'));
    }

    public function destroy(Dosage $dosage)
    {
        abort_if(Gate::denies('dosage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosage->delete();

        return back();
    }

    public function massDestroy(MassDestroyDosageRequest $request)
    {
        Dosage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
