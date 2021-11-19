<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Medicaments
    Route::apiResource('medicaments', 'MedicamentsApiController');

    // Sites
    Route::apiResource('sites', 'SitesApiController');

    // Fabriquants
    Route::apiResource('fabriquants', 'FabriquantsApiController');

    // Formules
    Route::apiResource('formules', 'FormulesApiController');

    // Familles
    Route::apiResource('familles', 'FamillesApiController');

    // Fournisseurs
    Route::apiResource('fournisseurs', 'FournisseursApiController');

    // References
    Route::apiResource('references', 'ReferencesApiController');

    // Representants Locaux
    Route::apiResource('representants-locauxes', 'RepresentantsLocauxApiController');

    // Materiels
    Route::apiResource('materiels', 'MaterielsApiController');

    // Forme
    Route::apiResource('formes', 'FormeApiController');

    // Dosage
    Route::apiResource('dosages', 'DosageApiController');

    // Sorties
    Route::apiResource('sorties', 'SortiesApiController');

    // Sorties Medicaments
    Route::apiResource('sorties-medicaments', 'SortiesMedicamentsApiController');

    // Entrees Medicaments
    Route::apiResource('entrees-medicaments', 'EntreesMedicamentsApiController');

    // Destinations
    Route::apiResource('destinations', 'DestinationsApiController');

    // Incrementation Materiels
    Route::apiResource('incrementation-materiels', 'IncrementationMaterielsApiController');
});
