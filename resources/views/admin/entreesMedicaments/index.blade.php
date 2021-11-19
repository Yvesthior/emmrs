@extends('layouts.admin')
@section('content')
<div class="content">
    @can('entrees_medicament_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.entrees-medicaments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.entreesMedicament.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'EntreesMedicament', 'route' => 'admin.entrees-medicaments.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.entreesMedicament.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EntreesMedicament">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.medicament') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.designation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.provenance') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.conditonnement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.nombre_conditionnement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.upc') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.prix_unitaire') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.date_peremption') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.fabriquant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.entreesMedicament.fields.destination') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($medicaments as $key => $item)
                                            <option value="{{ $item->slug }}">{{ $item->slug }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
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
@can('entrees_medicament_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.entrees-medicaments.massDestroy') }}",
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
    ajax: "{{ route('admin.entrees-medicaments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'medicament_slug', name: 'medicament.slug' },
{ data: 'medicament.designation', name: 'medicament.designation' },
{ data: 'date', name: 'date' },
{ data: 'provenance_nom', name: 'provenance.nom' },
{ data: 'conditonnement_designation', name: 'conditonnement.designation' },
{ data: 'nombre_conditionnement', name: 'nombre_conditionnement' },
{ data: 'upc', name: 'upc' },
{ data: 'prix_unitaire', name: 'prix_unitaire' },
{ data: 'date_peremption', name: 'date_peremption' },
{ data: 'fabriquant_nom', name: 'fabriquant.nom' },
{ data: 'destination_nom', name: 'destination.nom' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-EntreesMedicament').DataTable(dtOverrideGlobals);
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