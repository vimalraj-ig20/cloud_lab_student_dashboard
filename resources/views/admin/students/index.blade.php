@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.students.create") }}">
            <!-- {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }} -->
            Add cloud Student
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <!-- {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }} -->
         Cloud students
    </div>
    <form action ="users/import" method ="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <input type="file" name="file" />
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-student">
                <thead>
                    <tr>
                        <th width="2">

                        </th>
                        <th width="2">
                           id
                        </th>
                        <th>
                            Roll_no
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                            ph_no
                        </th>
                        <th>
                            mentor
                        </th>
                        <th>
                            mentor_no
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students ?? '' as $key => $student)
                        <tr data-entry-id="{{ $student->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $student->id ?? '' }}
                            </td>
                            <td>
                                {{ $student->roll_no ?? '' }}
                            </td>
                            <td>
                                {{ $student->name ?? '' }}
                            </td>
                            <td>
                                {{ $student->email ?? '' }}
                            </td>
                            <td>
                                {{ $student->department ?? '' }}
                            </td>
                            <td>
                                {{ $student->ph_no ?? '' }}
                            </td>
                            <td>
                                {{ $student->mentor ?? '' }}
                            </td>
                            <td>
                                {{ $student->mentor_no ?? '' }}
                            </td>
                            <!-- <td>
                                @foreach($student->permissions()->pluck('name') as $permission)
                                    <span class="badge badge-info">{{ $permission }}</span>
                                @endforeach
                            </td> -->
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.students.show', $student->id) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.students.edit', $student->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.students.mass_destroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-student:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection