<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySortiesMedicamentRequest;
use App\Http\Requests\StoreSortiesMedicamentRequest;
use App\Http\Requests\UpdateSortiesMedicamentRequest;
use App\Models\Destination;
use App\Models\Medicament;
use App\Models\SortiesMedicament;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SortiesMedicamentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sorties_medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SortiesMedicament::with(['medicament', 'destination'])->select(sprintf('%s.*', (new SortiesMedicament())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sorties_medicament_show';
                $editGate = 'sorties_medicament_edit';
                $deleteGate = 'sorties_medicament_delete';
                $crudRoutePart = 'sorties-medicaments';

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

            $table->editColumn('nombre_conditionnement', function ($row) {
                return $row->nombre_conditionnement ? $row->nombre_conditionnement : '';
            });
            $table->editColumn('total_unite', function ($row) {
                return $row->total_unite ? $row->total_unite : '';
            });
            $table->editColumn('upc', function ($row) {
                return $row->upc ? $row->upc : '';
            });
            $table->editColumn('rubrique_sortie', function ($row) {
                return $row->rubrique_sortie ? $row->rubrique_sortie : '';
            });
            $table->addColumn('destination_nom', function ($row) {
                return $row->destination ? $row->destination->nom : '';
            });

            $table->editColumn('observation', function ($row) {
                return $row->observation ? $row->observation : '';
            });
            $table->editColumn('cout', function ($row) {
                return $row->cout ? $row->cout : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'medicament', 'destination']);

            return $table->make(true);
        }

        $medicaments  = Medicament::get();
        $destinations = Destination::get();

        return view('admin.sortiesMedicaments.index', compact('medicaments', 'destinations'));
    }

    public function create()
    {
        abort_if(Gate::denies('sorties_medicament_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicaments = Medicament::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Destination::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sortiesMedicaments.create', compact('medicaments', 'destinations'));
    }

    public function store(StoreSortiesMedicamentRequest $request)
    {
        $sortiesMedicament = SortiesMedicament::create($request->all());

        return redirect()->route('admin.sorties-medicaments.index');
    }

    public function edit(SortiesMedicament $sortiesMedicament)
    {
        abort_if(Gate::denies('sorties_medicament_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicaments = Medicament::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Destination::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sortiesMedicament->load('medicament', 'destination');

        return view('admin.sortiesMedicaments.edit', compact('medicaments', 'destinations', 'sortiesMedicament'));
    }

    public function update(UpdateSortiesMedicamentRequest $request, SortiesMedicament $sortiesMedicament)
    {
        $sortiesMedicament->update($request->all());

        return redirect()->route('admin.sorties-medicaments.index');
    }

    public function show(SortiesMedicament $sortiesMedicament)
    {
        abort_if(Gate::denies('sorties_medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sortiesMedicament->load('medicament', 'destination');

        return view('admin.sortiesMedicaments.show', compact('sortiesMedicament'));
    }

    public function destroy(SortiesMedicament $sortiesMedicament)
    {
        abort_if(Gate::denies('sorties_medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sortiesMedicament->delete();

        return back();
    }

    public function massDestroy(MassDestroySortiesMedicamentRequest $request)
    {
        SortiesMedicament::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
