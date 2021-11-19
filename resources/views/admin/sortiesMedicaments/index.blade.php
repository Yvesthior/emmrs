@extends('layouts.admin')
@section('content')
<div class="content">
    @can('sorties_medicament_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sorties-medicaments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.sortiesMedicament.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'SortiesMedicament', 'route' => 'admin.sorties-medicaments.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.sortiesMedicament.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SortiesMedicament">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.medicament') }}
                                </th>
                                <th>
                                    {{ trans('cruds.medicament.fields.designation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.date_sortie') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.nombre_conditionnement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.total_unite') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.upc') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.rubrique_sortie') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.destination') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.observation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sortiesMedicament.fields.cout') }}
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
                                        @foreach($destinations as $key => $item)
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
@can('sorties_medicament_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sorties-medicaments.massDestroy') }}",
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
    ajax: "{{ route('admin.sorties-medicaments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'medicament_slug', name: 'medicament.slug' },
{ data: 'medicament.designation', name: 'medicament.designation' },
{ data: 'date_sortie', name: 'date_sortie' },
{ data: 'nombre_conditionnement', name: 'nombre_conditionnement' },
{ data: 'total_unite', name: 'total_unite' },
{ data: 'upc', name: 'upc' },
{ data: 'rubrique_sortie', name: 'rubrique_sortie' },
{ data: 'destination_nom', name: 'destination.nom' },
{ data: 'observation', name: 'observation' },
{ data: 'cout', name: 'cout' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-SortiesMedicament').DataTable(dtOverrideGlobals);
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