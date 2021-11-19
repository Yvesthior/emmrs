<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMaterielRequest;
use App\Http\Requests\StoreMaterielRequest;
use App\Http\Requests\UpdateMaterielRequest;
use App\Models\Fabriquant;
use App\Models\Materiel;
use App\Models\RepresentantsLocaux;
use App\Models\Site;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MaterielsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('materiel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Materiel::with(['fabriquant', 'representant_local', 'provenance', 'destination'])->select(sprintf('%s.*', (new Materiel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'materiel_show';
                $editGate = 'materiel_edit';
                $deleteGate = 'materiel_delete';
                $crudRoutePart = 'materiels';

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
            $table->editColumn('lot', function ($row) {
                return $row->lot ? $row->lot : '';
            });
            $table->editColumn('id_unique', function ($row) {
                return $row->id_unique ? $row->id_unique : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('identifiant', function ($row) {
                return $row->identifiant ? $row->identifiant : '';
            });
            $table->editColumn('designation', function ($row) {
                return $row->designation ? $row->designation : '';
            });

            $table->editColumn('quantite', function ($row) {
                return $row->quantite ? $row->quantite : '';
            });
            $table->editColumn('marque', function ($row) {
                return $row->marque ? $row->marque : '';
            });
            $table->editColumn('modele', function ($row) {
                return $row->modele ? $row->modele : '';
            });
            $table->editColumn('numero_serie', function ($row) {
                return $row->numero_serie ? $row->numero_serie : '';
            });
            $table->addColumn('fabriquant_nom', function ($row) {
                return $row->fabriquant ? $row->fabriquant->nom : '';
            });

            $table->addColumn('representant_local_nom', function ($row) {
                return $row->representant_local ? $row->representant_local->nom : '';
            });

            $table->editColumn('prix_unitaire', function ($row) {
                return $row->prix_unitaire ? $row->prix_unitaire : '';
            });
            $table->editColumn('prix_total', function ($row) {
                return $row->prix_total ? $row->prix_total : '';
            });
            $table->addColumn('provenance_nom', function ($row) {
                return $row->provenance ? $row->provenance->nom : '';
            });

            $table->addColumn('destination_nom', function ($row) {
                return $row->destination ? $row->destination->nom : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'fabriquant', 'representant_local', 'provenance', 'destination']);

            return $table->make(true);
        }

        $fabriquants            = Fabriquant::get();
        $representants_locauxes = RepresentantsLocaux::get();
        $sites                  = Site::get();

        return view('admin.materiels.index', compact('fabriquants', 'representants_locauxes', 'sites'));
    }

    public function create()
    {
        abort_if(Gate::denies('materiel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $representant_locals = RepresentantsLocaux::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.materiels.create', compact('fabriquants', 'representant_locals', 'provenances', 'destinations'));
    }

    public function store(StoreMaterielRequest $request)
    {
        $materiel = Materiel::create($request->all());

        return redirect()->route('admin.materiels.index');
    }

    public function edit(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $representant_locals = RepresentantsLocaux::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $materiel->load('fabriquant', 'representant_local', 'provenance', 'destination');

        return view('admin.materiels.edit', compact('fabriquants', 'representant_locals', 'provenances', 'destinations', 'materiel'));
    }

    public function update(UpdateMaterielRequest $request, Materiel $materiel)
    {
        $materiel->update($request->all());

        return redirect()->route('admin.materiels.index');
    }

    public function show(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiel->load('fabriquant', 'representant_local', 'provenance', 'destination', 'equipementSorties');

        return view('admin.materiels.show', compact('materiel'));
    }

    public function destroy(Materiel $materiel)
    {
        abort_if(Gate::denies('materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiel->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterielRequest $request)
    {
        Materiel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
