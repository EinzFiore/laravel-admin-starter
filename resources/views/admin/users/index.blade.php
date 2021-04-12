@extends('layouts.base')
@section('page-title', 'Dashboard Users')
@section('content')
<div>
  <div class="col-sm-12 mb-2">
      <div class="row">
        <div class="col-xl-6 col-sm-12">
          <div class="btn-group btn-group" role="group" aria-label="Basic example">
            <button class="btn btn-light btn-lg" type="button" data-toggle="modal" data-target="#addUser">Add New Users</button>
            <button class="btn btn-dark btn-lg" type="button" data-toggle="modal" data-target="#addRole">Add New Role</button>
          </div>
        </div>
      </div>
  </div>
</div>
@include('admin.users.create')
<div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Data Users</h5>
      </div>
      <!-- Order Column styles-->
          <div class="card-body">
            <div class="table-responsive">
              <table class="order-column server">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
      <!-- Order Column Ends-->
    </div>
  </div>
</div>

  <!-- Order Column Ends-->
@include('admin.role.create')
@endsection

@push('script.custom')
<script type="text/javascript">
  $(document).ready(function() {
        // init datatable.
        var dataTable = $('.server').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 5,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route('admin.users.get') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'roles.name', name: 'role'},
                {data: 'created_at', name: 'created_at'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

        // Create users Ajax request.
    $('#addNewUser').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.users.add') }}",
                method: 'post',
                data: {
                    name: $('#name').val(),
                    username: $('#username').val(),
                    email: $('#email').val(),
                    role: $('#role').val(),
                    password: $('#password').val(),
                },
                success: function(result) {
                    if(result.errors) {
                      toastr.error(result.errors);
                      $('.alert-danger').html('');
                      $.each(result.errors, function(key, value) {
                          toastr.errors(value);
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        toastr.success(result.success);
                        $('.datatable').DataTable().ajax.reload();
                        setInterval(function(res){ 
                            $('#addUser').modal('hide');
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });
        // Create role Ajax request.
    $('#addNewRole').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.add.role') }}",
                method: 'post',
                data: {
                    name: $('#nameRole').val(),
                },
                success: function(result) {
                    if(result.errors) {
                      toastr.error(result.errors);
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.datatable').DataTable().ajax.reload();
                        toastr.success(result.success);
                        setInterval(function(res){ 
                            $('#addUser').modal('hide');
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });
    });
    
</script>
@endpush
