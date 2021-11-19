<div class="content">
    @can('sorty_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sorties.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.sorty.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.sorty.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-equipementSorties">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.equipement') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.materiel.fields.designation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.quantite') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.date_sortie') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.rubrique') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.destination') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sorty.fields.observation') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sorties as $key => $sorty)
                                    <tr data-entry-id="{{ $sorty->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $sorty->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->equipement->identifiant ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->equipement->designation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->quantite ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->date_sortie ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->rubrique ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->destination->nom ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sorty->observation ?? '' }}
                                        </td>
                                        <td>
                                            @can('sorty_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.sorties.show', $sorty->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('sorty_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.sorties.edit', $sorty->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('sorty_delete')
                                                <form action="{{ route('admin.sorties.destroy', $sorty->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sorty_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sorties.massDestroy') }}",
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
  let table = $('.datatable-equipementSorties:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection