@extends('layouts.admin')
@section('content')
<div class="content">
    @can('materiel_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.materiels.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.materiel.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Materiel', 'route' => 'admin.materiels.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.materiel.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Materiel">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.lot') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.id_unique') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.identifiant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.designation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.date_inventaire') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.quantite') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.marque') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.modele') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.numero_serie') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.fabriquant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.representant_local') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.prix_unitaire') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.prix_total') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.provenance') }}
                                </th>
                                <th>
                                    {{ trans('cruds.materiel.fields.destination') }}
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
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
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
                                        @foreach($representants_locauxes as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
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
                                        @foreach($sites as $key => $item)
                                            <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
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
@can('materiel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.materiels.massDestroy') }}",
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
    ajax: "{{ route('admin.materiels.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'lot', name: 'lot' },
{ data: 'id_unique', name: 'id_unique' },
{ data: 'code', name: 'code' },
{ data: 'identifiant', name: 'identifiant' },
{ data: 'designation', name: 'designation' },
{ data: 'date_inventaire', name: 'date_inventaire' },
{ data: 'quantite', name: 'quantite' },
{ data: 'marque', name: 'marque' },
{ data: 'modele', name: 'modele' },
{ data: 'numero_serie', name: 'numero_serie' },
{ data: 'fabriquant_nom', name: 'fabriquant.nom' },
{ data: 'representant_local_nom', name: 'representant_local.nom' },
{ data: 'prix_unitaire', name: 'prix_unitaire' },
{ data: 'prix_total', name: 'prix_total' },
{ data: 'provenance_nom', name: 'provenance.nom' },
{ data: 'destination_nom', name: 'destination.nom' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Materiel').DataTable(dtOverrideGlobals);
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