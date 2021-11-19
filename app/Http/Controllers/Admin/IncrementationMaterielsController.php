<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIncrementationMaterielRequest;
use App\Http\Requests\StoreIncrementationMaterielRequest;
use App\Http\Requests\UpdateIncrementationMaterielRequest;
use App\Models\Fabriquant;
use App\Models\Fournisseur;
use App\Models\IncrementationMateriel;
use App\Models\Materiel;
use App\Models\Site;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IncrementationMaterielsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('incrementation_materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = IncrementationMateriel::with(['materiel', 'provenance', 'fabriquant', 'destination'])->select(sprintf('%s.*', (new IncrementationMateriel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'incrementation_materiel_show';
                $editGate = 'incrementation_materiel_edit';
                $deleteGate = 'incrementation_materiel_delete';
                $crudRoutePart = 'incrementation-materiels';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('materiel_identifiant', function ($row) {
                return $row->materiel ? $row->materiel->identifiant : '';
            });

            $table->editColumn('quantite', function ($row) {
                return $row->quantite ? $row->quantite : '';
            });

            $table->addColumn('provenance_nom', function ($row) {
                return $row->provenance ? $row->provenance->nom : '';
            });

            $table->editColumn('prix_unitaire', function ($row) {
                return $row->prix_unitaire ? $row->prix_unitaire : '';
            });
            $table->editColumn('date_peremption', function ($row) {
                return $row->date_peremption ? $row->date_peremption : '';
            });
            $table->addColumn('fabriquant_nom', function ($row) {
                return $row->fabriquant ? $row->fabriquant->nom : '';
            });

            $table->addColumn('destination_nom', function ($row) {
                return $row->destination ? $row->destination->nom : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'materiel', 'provenance', 'fabriquant', 'destination']);

            return $table->make(true);
        }

        $materiels    = Materiel::get();
        $fournisseurs = Fournisseur::get();
        $fabriquants  = Fabriquant::get();
        $sites        = Site::get();

        return view('admin.incrementationMateriels.index', compact('materiels', 'fournisseurs', 'fabriquants', 'sites'));
    }

    public function create()
    {
        abort_if(Gate::denies('incrementation_materiel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiels = Materiel::pluck('identifiant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.incrementationMateriels.create', compact('materiels', 'provenances', 'fabriquants', 'destinations'));
    }

    public function store(StoreIncrementationMaterielRequest $request)
    {
        $incrementationMateriel = IncrementationMateriel::create($request->all());

        return redirect()->route('admin.incrementation-materiels.index');
    }

    public function edit(IncrementationMateriel $incrementationMateriel)
    {
        abort_if(Gate::denies('incrementation_materiel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiels = Materiel::pluck('identifiant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $incrementationMateriel->load('materiel', 'provenance', 'fabriquant', 'destination');

        return view('admin.incrementationMateriels.edit', compact('materiels', 'provenances', 'fabriquants', 'destinations', 'incrementationMateriel'));
    }

    public function update(UpdateIncrementationMaterielRequest $request, IncrementationMateriel $incrementationMateriel)
    {
        $incrementationMateriel->update($request->all());

        return redirect()->route('admin.incrementation-materiels.index');
    }

    public function show(IncrementationMateriel $incrementationMateriel)
    {
        abort_if(Gate::denies('incrementation_materiel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incrementationMateriel->load('materiel', 'provenance', 'fabriquant', 'destination');

        return view('admin.incrementationMateriels.show', compact('incrementationMateriel'));
    }

    public function destroy(IncrementationMateriel $incrementationMateriel)
    {
        abort_if(Gate::denies('incrementation_materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incrementationMateriel->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncrementationMaterielRequest $request)
    {
        IncrementationMateriel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
