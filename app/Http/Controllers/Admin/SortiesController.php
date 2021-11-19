<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySortyRequest;
use App\Http\Requests\StoreSortyRequest;
use App\Http\Requests\UpdateSortyRequest;
use App\Models\Materiel;
use App\Models\Site;
use App\Models\Sorty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SortiesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sorty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sorty::with(['equipement', 'destination'])->select(sprintf('%s.*', (new Sorty())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sorty_show';
                $editGate = 'sorty_edit';
                $deleteGate = 'sorty_delete';
                $crudRoutePart = 'sorties';

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
            $table->addColumn('equipement_identifiant', function ($row) {
                return $row->equipement ? $row->equipement->identifiant : '';
            });

            $table->editColumn('equipement.designation', function ($row) {
                return $row->equipement ? (is_string($row->equipement) ? $row->equipement : $row->equipement->designation) : '';
            });
            $table->editColumn('quantite', function ($row) {
                return $row->quantite ? $row->quantite : '';
            });

            $table->editColumn('rubrique', function ($row) {
                return $row->rubrique ? $row->rubrique : '';
            });
            $table->addColumn('destination_nom', function ($row) {
                return $row->destination ? $row->destination->nom : '';
            });

            $table->editColumn('observation', function ($row) {
                return $row->observation ? $row->observation : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'equipement', 'destination']);

            return $table->make(true);
        }

        $materiels = Materiel::get();
        $sites     = Site::get();

        return view('admin.sorties.index', compact('materiels', 'sites'));
    }

    public function create()
    {
        abort_if(Gate::denies('sorty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipements = Materiel::pluck('identifiant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sorties.create', compact('equipements', 'destinations'));
    }

    public function store(StoreSortyRequest $request)
    {
        $sorty = Sorty::create($request->all());

        return redirect()->route('admin.sorties.index');
    }

    public function edit(Sorty $sorty)
    {
        abort_if(Gate::denies('sorty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipements = Materiel::pluck('identifiant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Site::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sorty->load('equipement', 'destination');

        return view('admin.sorties.edit', compact('equipements', 'destinations', 'sorty'));
    }

    public function update(UpdateSortyRequest $request, Sorty $sorty)
    {
        $sorty->update($request->all());

        return redirect()->route('admin.sorties.index');
    }

    public function show(Sorty $sorty)
    {
        abort_if(Gate::denies('sorty_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sorty->load('equipement', 'destination');

        return view('admin.sorties.show', compact('sorty'));
    }

    public function destroy(Sorty $sorty)
    {
        abort_if(Gate::denies('sorty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sorty->delete();

        return back();
    }

    public function massDestroy(MassDestroySortyRequest $request)
    {
        Sorty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
