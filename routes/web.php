<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Medicaments
    Route::delete('medicaments/destroy', 'MedicamentsController@massDestroy')->name('medicaments.massDestroy');
    Route::post('medicaments/parse-csv-import', 'MedicamentsController@parseCsvImport')->name('medicaments.parseCsvImport');
    Route::post('medicaments/process-csv-import', 'MedicamentsController@processCsvImport')->name('medicaments.processCsvImport');
    Route::resource('medicaments', 'MedicamentsController');

    // Sites
    Route::delete('sites/destroy', 'SitesController@massDestroy')->name('sites.massDestroy');
    Route::post('sites/parse-csv-import', 'SitesController@parseCsvImport')->name('sites.parseCsvImport');
    Route::post('sites/process-csv-import', 'SitesController@processCsvImport')->name('sites.processCsvImport');
    Route::resource('sites', 'SitesController');

    // Fabriquants
    Route::delete('fabriquants/destroy', 'FabriquantsController@massDestroy')->name('fabriquants.massDestroy');
    Route::resource('fabriquants', 'FabriquantsController');

    // Classe Therapeutique
    Route::delete('classe-therapeutiques/destroy', 'ClasseTherapeutiqueController@massDestroy')->name('classe-therapeutiques.massDestroy');
    Route::resource('classe-therapeutiques', 'ClasseTherapeutiqueController');

    // Formules
    Route::delete('formules/destroy', 'FormulesController@massDestroy')->name('formules.massDestroy');
    Route::resource('formules', 'FormulesController');

    // Familles
    Route::delete('familles/destroy', 'FamillesController@massDestroy')->name('familles.massDestroy');
    Route::resource('familles', 'FamillesController');

    // Fournisseurs
    Route::delete('fournisseurs/destroy', 'FournisseursController@massDestroy')->name('fournisseurs.massDestroy');
    Route::resource('fournisseurs', 'FournisseursController');

    // References
    Route::delete('references/destroy', 'ReferencesController@massDestroy')->name('references.massDestroy');
    Route::resource('references', 'ReferencesController');

    // Representants Locaux
    Route::delete('representants-locauxes/destroy', 'RepresentantsLocauxController@massDestroy')->name('representants-locauxes.massDestroy');
    Route::resource('representants-locauxes', 'RepresentantsLocauxController');

    // Materiels
    Route::delete('materiels/destroy', 'MaterielsController@massDestroy')->name('materiels.massDestroy');
    Route::post('materiels/parse-csv-import', 'MaterielsController@parseCsvImport')->name('materiels.parseCsvImport');
    Route::post('materiels/process-csv-import', 'MaterielsController@processCsvImport')->name('materiels.processCsvImport');
    Route::resource('materiels', 'MaterielsController');

    // Forme
    Route::delete('formes/destroy', 'FormeController@massDestroy')->name('formes.massDestroy');
    Route::resource('formes', 'FormeController');

    // Dosage
    Route::delete('dosages/destroy', 'DosageController@massDestroy')->name('dosages.massDestroy');
    Route::resource('dosages', 'DosageController');

    // Conditionnement
    Route::delete('conditionnements/destroy', 'ConditionnementController@massDestroy')->name('conditionnements.massDestroy');
    Route::resource('conditionnements', 'ConditionnementController');

    // Sorties
    Route::delete('sorties/destroy', 'SortiesController@massDestroy')->name('sorties.massDestroy');
    Route::post('sorties/parse-csv-import', 'SortiesController@parseCsvImport')->name('sorties.parseCsvImport');
    Route::post('sorties/process-csv-import', 'SortiesController@processCsvImport')->name('sorties.processCsvImport');
    Route::resource('sorties', 'SortiesController');

    // Sorties Medicaments
    Route::delete('sorties-medicaments/destroy', 'SortiesMedicamentsController@massDestroy')->name('sorties-medicaments.massDestroy');
    Route::post('sorties-medicaments/parse-csv-import', 'SortiesMedicamentsController@parseCsvImport')->name('sorties-medicaments.parseCsvImport');
    Route::post('sorties-medicaments/process-csv-import', 'SortiesMedicamentsController@processCsvImport')->name('sorties-medicaments.processCsvImport');
    Route::resource('sorties-medicaments', 'SortiesMedicamentsController');

    // Entrees Medicaments
    Route::delete('entrees-medicaments/destroy', 'EntreesMedicamentsController@massDestroy')->name('entrees-medicaments.massDestroy');
    Route::post('entrees-medicaments/parse-csv-import', 'EntreesMedicamentsController@parseCsvImport')->name('entrees-medicaments.parseCsvImport');
    Route::post('entrees-medicaments/process-csv-import', 'EntreesMedicamentsController@processCsvImport')->name('entrees-medicaments.processCsvImport');
    Route::resource('entrees-medicaments', 'EntreesMedicamentsController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Destinations
    Route::delete('destinations/destroy', 'DestinationsController@massDestroy')->name('destinations.massDestroy');
    Route::post('destinations/parse-csv-import', 'DestinationsController@parseCsvImport')->name('destinations.parseCsvImport');
    Route::post('destinations/process-csv-import', 'DestinationsController@processCsvImport')->name('destinations.processCsvImport');
    Route::resource('destinations', 'DestinationsController');

    // Nouvelle Entree
    Route::delete('nouvelle-entrees/destroy', 'NouvelleEntreeController@massDestroy')->name('nouvelle-entrees.massDestroy');
    Route::resource('nouvelle-entrees', 'NouvelleEntreeController');

    // Entree Materiel
    Route::delete('entree-materiels/destroy', 'EntreeMaterielController@massDestroy')->name('entree-materiels.massDestroy');
    Route::resource('entree-materiels', 'EntreeMaterielController');

    // Incrementation Materiels
    Route::delete('incrementation-materiels/destroy', 'IncrementationMaterielsController@massDestroy')->name('incrementation-materiels.massDestroy');
    Route::post('incrementation-materiels/parse-csv-import', 'IncrementationMaterielsController@parseCsvImport')->name('incrementation-materiels.parseCsvImport');
    Route::post('incrementation-materiels/process-csv-import', 'IncrementationMaterielsController@processCsvImport')->name('incrementation-materiels.processCsvImport');
    Route::resource('incrementation-materiels', 'IncrementationMaterielsController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
