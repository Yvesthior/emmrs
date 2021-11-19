<div class="content">
    @can('materiel_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.materiels.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.materiel.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-provenanceMateriels">
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
                            </thead>
                            <tbody>
                                @foreach($materiels as $key => $materiel)
                                    <tr data-entry-id="{{ $materiel->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $materiel->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->lot ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->id_unique ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->identifiant ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->designation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->date_inventaire ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->quantite ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->marque ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->modele ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->numero_serie ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->fabriquant->nom ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->representant_local->nom ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->prix_unitaire ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->prix_total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->provenance->nom ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materiel->destination->nom ?? '' }}
                                        </td>
                                        <td>
                                            @can('materiel_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.materiels.show', $materiel->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('materiel_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.materiels.edit', $materiel->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('materiel_delete')
                                                <form action="{{ route('admin.materiels.destroy', $materiel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('materiel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.materiels.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-provenanceMateriels:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection