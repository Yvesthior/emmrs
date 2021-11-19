@extends('layouts.admin')
@section('content')
<div class="content">
    @can('medicament_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.medicaments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.medicament.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Medicament', 'route' => 'admin.medicaments.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.medicament.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Medicament">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.identifiant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.designation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.lot') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.dci') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.forme') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.dosage') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.conditionnement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.upc') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.nombre_conditionnement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.total_unites') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.prix_unitaire') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.prix_total') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.date_peremption') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.classe_therapeutique') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.fabriquant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.formule') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.famille') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.date_reception') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.provenance') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.fournisseur') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.destination') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.reference') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.observation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.slug') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Medicament::TYPE_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($formes as $key => $item)
                                            <option value="{{ $item->designation }}">{{ $item->designation }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($dosages as $key => $item)
                                            <option value="{{ $item->quantite }}">{{ $item->quantite }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($conditionnements as $key => $item)
                                            <option value="{{ $item->designation }}">{{ $item->designation }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($classe_therapeutiques as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($fabriquants as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($formules as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($familles as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($sites as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($fournisseurs as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($sites as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($references as $key => $item)
                                            <option value="{{ $item->code }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('medicament_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.medicaments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.medicaments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'code', name: 'code' },
{ data: 'identifiant', name: 'identifiant' },
{ data: 'designation', name: 'designation' },
{ data: 'lot', name: 'lot' },
{ data: 'type', name: 'type' },
{ data: 'dci', name: 'dci' },
{ data: 'forme_designation', name: 'forme.designation' },
{ data: 'dosage_quantite', name: 'dosage.quantite' },
{ data: 'conditionnement_designation', name: 'conditionnement.designation' },
{ data: 'upc', name: 'upc' },
{ data: 'nombre_conditionnement', name: 'nombre_conditionnement' },
{ data: 'total_unites', name: 'total_unites' },
{ data: 'prix_unitaire', name: 'prix_unitaire' },
{ data: 'prix_total', name: 'prix_total' },
{ data: 'date_peremption', name: 'date_peremption' },
{ data: 'classe_therapeutique_nom', name: 'classe_therapeutique.nom' },
{ data: 'fabriquant_nom', name: 'fabriquant.nom' },
{ data: 'formule_nom', name: 'formule.nom' },
{ data: 'famille_nom', name: 'famille.nom' },
{ data: 'date_reception', name: 'date_reception' },
{ data: 'provenance_nom', name: 'provenance.nom' },
{ data: 'fournisseur_nom', name: 'fournisseur.nom' },
{ data: 'destination_nom', name: 'destination.nom' },
{ data: 'reference_code', name: 'reference.code' },
{ data: 'observation', name: 'observation' },
{ data: 'slug', name: 'slug' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Medicament').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection