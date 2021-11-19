<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMedicamentRequest;
use App\Http\Requests\StoreMedicamentRequest;
use App\Http\Requests\UpdateMedicamentRequest;
use App\Models\ClasseTherapeutique;
use App\Models\Conditionnement;
use App\Models\Dosage;
use App\Models\Fabriquant;
use App\Models\Famille;
use App\Models\Forme;
use App\Models\Formule;
use App\Models\Fournisseur;
use App\Models\Medicament;
use App\Models\Reference;
use App\Models\Site;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MedicamentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Medicament::with(['forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference'])->select(sprintf('%s.*', (new Medicament())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'medicament_show';
                $editGate = 'medicament_edit';
                $deleteGate = 'medicament_delete';
                $crudRoutePart = 'medicaments';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('identifiant', function ($row) {
                return $row->identifiant ? $row->identifiant : '';
            });
            $table->editColumn('designation', function ($row) {
                return $row->designation ? $row->designation : '';
            });
            $table->editColumn('lot', function ($row) {
                return $row->lot ? $row->lot : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Medicament::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('dci', function ($row) {
                return $row->dci ? $row->dci : '';
            });
            $table->addColumn('forme_designation', function ($row) {
                return $row->forme ? $row->forme->designation : '';
            });

            $table->addColumn('dosage_quantite', function ($row) {
                return $row->dosage ? $row->dosage->quantite : '';
            });

            $table->addColumn('conditionnement_designation', function ($row) {
                return $row->conditionnement ? $row->conditionnement->designation : '';
            });

            $table->editColumn('upc', function ($row) {
                return $row->upc ? $row->upc : '';
            });
            $table->editColumn('nombre_conditionnement', function ($row) {
                return $row->nombre_conditionnement ? $row->nombre_conditionnement : '';
            });
            $table->editColumn('total_unites', function ($row) {
                return $row->total_unites ? $row->total_unites : '';
            });
            $table->editColumn('prix_unitaire', function ($row) {
                return $row->prix_unitaire ? $row->prix_unitaire : '';
            });
            $table->editColumn('prix_total', function ($row) {
                return $row->prix_total ? $row->prix_total : '';
            });

            $table->addColumn('classe_therapeutique_nom', function ($row) {
                return $row->classe_therapeutique ? $row->classe_therapeutique->nom : '';
            });

            $table->addColumn('fabriquant_nom', function ($row) {
                return $row->fabriquant ? $row->fabriquant->nom : '';
            });

            $table->addColumn('formule_nom', function ($row) {
                return $row->formule ? $row->formule->nom : '';
            });

            $table->addColumn('famille_nom', function ($row) {
                return $row->famille ? $row->famille->nom : '';
            });

            $table->addColumn('provenance_nom', function ($row) {
                return $row->provenance ? $row->provenance->nom : '';
            });

            $table->addColumn('fournisseur_nom', function ($row) {
                return $row->fournisseur ? $row->fournisseur->nom : '';
            });

            $table->addColumn('destination_nom', function ($row) {
                return $row->destination ? $row->destination->nom : '';
            });

            $table->addColumn('reference_code', function ($row) {
                return $row->reference ? $row->reference->code : '';
            });

            $table->editColumn('observation', function ($row) {
                return $row->observation ? $row->observation : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference']);

            return $table->make(true);
        }

        $formes                = Forme::get();
        $dosages               = Dosage::get();
        $conditionnements      = Conditionnement::get();
        $classe_therapeutiques = ClasseTherapeutique::get();
        $fabriquants           = Fabriquant::get();
        $formules              = Formule::get();
        $familles              = Famille::get();
        $sites                 = Site::get();
        $fournisseurs          = Fournisseur::get();
        $references            = Reference::get();

        return view('admin.medicaments.index', compact('formes', 'dosages', 'conditionnements', 'classe_therapeutiques', 'fabriquants', 'formules', 'familles', 'sites', 'fournisseurs', 'references'));
    }

    public function create()
    {
        abort_if(Gate::denies('medicament_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formes = Forme::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dosages = Dosage::pluck('quantite', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conditionnements = Conditionnement::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classe_therapeutiques = ClasseTherapeutique::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formules = Formule::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $familles = Famille::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fournisseurs = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $references = Reference::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.medicaments.create', compact('formes', 'dosages', 'conditionnements', 'classe_therapeutiques', 'fabriquants', 'formules', 'familles', 'provenances', 'fournisseurs', 'destinations', 'references'));
    }

    public function store(StoreMedicamentRequest $request)
    {
        $medicament = Medicament::create($request->all());

        return redirect()->route('admin.medicaments.index');
    }

    public function edit(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formes = Forme::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dosages = Dosage::pluck('quantite', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conditionnements = Conditionnement::pluck('designation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classe_therapeutiques = ClasseTherapeutique::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabriquants = Fabriquant::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formules = Formule::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $familles = Famille::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provenances = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fournisseurs = Fournisseur::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $references = Reference::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $medicament->load('forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference');

        return view('admin.medicaments.edit', compact('formes', 'dosages', 'conditionnements', 'classe_therapeutiques', 'fabriquants', 'formules', 'familles', 'provenances', 'fournisseurs', 'destinations', 'references', 'medicament'));
    }

    public function update(UpdateMedicamentRequest $request, Medicament $medicament)
    {
        $medicament->update($request->all());

        return redirect()->route('admin.medicaments.index');
    }

    public function show(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicament->load('forme', 'dosage', 'conditionnement', 'classe_therapeutique', 'fabriquant', 'formule', 'famille', 'provenance', 'fournisseur', 'destination', 'reference');

        return view('admin.medicaments.show', compact('medicament'));
    }

    public function destroy(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicament->delete();

        return back();
    }

    public function massDestroy(MassDestroyMedicamentRequest $request)
    {
        Medicament::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
