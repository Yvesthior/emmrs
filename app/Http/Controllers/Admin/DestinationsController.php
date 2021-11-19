<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDestinationRequest;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\Destination;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DestinationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('destination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Destination::query()->select(sprintf('%s.*', (new Destination())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'destination_show';
                $editGate = 'destination_edit';
                $deleteGate = 'destination_delete';
                $crudRoutePart = 'destinations';

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
            $table->editColumn('nom', function ($row) {
                return $row->nom ? $row->nom : '';
            });
            $table->editColumn('budget_global', function ($row) {
                return $row->budget_global ? $row->budget_global : '';
            });
            $table->editColumn('solde', function ($row) {
                return $row->solde ? $row->solde : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.destinations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('destination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.create');
    }

    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->all());

        return redirect()->route('admin.destinations.index');
    }

    public function edit(Destination $destination)
    {
        abort_if(Gate::denies('destination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->all());

        return redirect()->route('admin.destinations.index');
    }

    public function show(Destination $destination)
    {
        abort_if(Gate::denies('destination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.show', compact('destination'));
    }

    public function destroy(Destination $destination)
    {
        abort_if(Gate::denies('destination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destination->delete();

        return back();
    }

    public function massDestroy(MassDestroyDestinationRequest $request)
    {
        Destination::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
