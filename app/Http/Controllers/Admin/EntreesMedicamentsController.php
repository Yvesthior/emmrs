<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEntreesMedicamentRequest;
use App\Http\Requests\StoreEntreesMedicamentRequest;
use App\Http\Requests\UpdateEntreesMedicamentRequest;
use App\Models\Conditionnement;
use App\Models\EntreesMedicament;
use App\Models\Fabriquant;
use App\Models\Fournisseur;
use App\Models\Medicament;
use App\Models\Site;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EntreesMedicamentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('entrees_medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EntreesMedicament::with(['medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination'])->select(sprintf('%s.*', (new EntreesMedicament())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'entrees_medicament_show';
                $editGate = 'entrees_medicament_edit';
                $deleteGate = 'entrees_medicament_delete';
                $crudRoutePart = 'entrees-medicaments';

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
            $table->addColumn('medicament_slug', function ($row) {
                return $row->medicament ? $row->medicament->slug : '';
            });

            $table->editColumn('medicament.designation', function ($row) {
                return $row->medicament ? (is_string($row->medicament) ? $row->medicament : $row->medicament->designation) : '';
            });

            $table->addColumn('provenance_nom', function ($row) {
                return $row->provenance ? $row->provenance->nom : '';
            });

            $table->addColumn('conditonnement_designation', function ($row) {
                return $row->conditonnement ? $row->conditonnement->designation : '';
            });

            $table->editColumn('nombre_conditionnement', function ($row) {
                return $row->nombre_conditionnement ? $row->nombre_conditionnement : '';
            });
            $table->editColumn('upc', function ($row) {
                return $row->upc ? $row->upc : '';
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

            $table->rawColumns(['actions', 'placeholder', 'medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination']);

            return $table->make(true);
        }

        $medicaments      = Medicament::get();
        $fournisseurs     = Fournisseur::get();
        $conditionnements = Conditionnement::get();
        $fabriquants      = Fabriquant::get();
        $sites            = Site::get();

        return view('admin.entreesMedicaments.index', compact('medicaments', 'fournisseurs', 'conditionnements', 'fabriquants', 'sites'));
    }

    public function create()
    {
        abort_if(Gate::denies('entrees_medicament_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicaments = Medicament::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conditonnements = Conditionnement::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.entreesMedicaments.create', compact('medicaments', 'provenances', 'conditonnements', 'fabriquants', 'destinations'));
    }

    public function store(StoreEntreesMedicamentRequest $request)
    {
        $entreesMedicament = EntreesMedicament::create($request->all());

        return redirect()->route('admin.entrees-medicaments.index');
    }

    public function edit(EntreesMedicament $entreesMedicament)
    {
        abort_if(Gate::denies('entrees_medicament_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicaments = Medicament::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conditonnements = Conditionnement::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entreesMedicament->load('medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination');

        return view('admin.entreesMedicaments.edit', compact('medicaments', 'provenances', 'conditonnements', 'fabriquants', 'destinations', 'entreesMedicament'));
    }

    public function update(UpdateEntreesMedicamentRequest $request, EntreesMedicament $entreesMedicament)
    {
        $entreesMedicament->update($request->all());

        return redirect()->route('admin.entrees-medicaments.index');
    }

    public function show(EntreesMedicament $entreesMedicament)
    {
        abort_if(Gate::denies('entrees_medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreesMedicament->load('medicament', 'provenance', 'conditonnement', 'fabriquant', 'destination');

        return view('admin.entreesMedicaments.show', compact('entreesMedicament'));
    }

    public function destroy(EntreesMedicament $entreesMedicament)
    {
        abort_if(Gate::denies('entrees_medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreesMedicament->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntreesMedicamentRequest $request)
    {
        EntreesMedicament::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
