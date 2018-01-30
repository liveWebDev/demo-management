<table class="table table-responsive" id="users-table">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>

    </tbody>
</table>


@push('scripts')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input:hidden[name=_token]').val()
    }
  });
  $(function() {
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('admin.users.data') !!}',
      columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'type', name: 'type' },
        { data: 'status', name: 'status' },
        { data: 'xstatus', name: 'xstatus' }
      ]
    });
  });
</script>
@endpush