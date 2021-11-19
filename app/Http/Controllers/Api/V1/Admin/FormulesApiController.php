<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormuleRequest;
use App\Http\Requests\UpdateFormuleRequest;
use App\Http\Resources\Admin\FormuleResource;
use App\Models\Formule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormulesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('formule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormuleResource(Formule::all());
    }

    public function store(StoreFormuleRequest $request)
    {
        $formule = Formule::create($request->all());

        return (new FormuleResource($formule))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Formule $formule)
    {
        abort_if(Gate::denies('formule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormuleResource($formule);
    }

    public function update(UpdateFormuleRequest $request, Formule $formule)
    {
        $formule->update($request->all());

        return (new FormuleResource($formule))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Formule $formule)
    {
        abort_if(Gate::denies('formule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formule->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
