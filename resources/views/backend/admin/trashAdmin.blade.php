@extends('layouts.main')
@section('content')
@section('section')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
           <div class="row">
            <div class="col-md-6">
              @if (Session::get('restore'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ Session::get('restore') }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @elseif(Session::get('forcedelete'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('forcedelete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @else
                  <h3>Admin Trash Record</h3>
              @endif
          </div>
            <div class="col-md-6">
              <a href="{{route('backend.admin.viewAdmin')}}"><button class="btn btn-info"><i class="fas fa-eye">View</i></button></a>
            </div>
           </div>
        </div><!-- /.container-fluid -->
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">First Name</th>
            <th class="th-sm">Last Name</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Image</th>
            <th class="th-sm">Address</th>
            <th class="th-sm">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($adminTrash as $value)
          <tr>
            <td>{{$value->adminFirstName}}</td>
            <td>{{$value->adminLastName}}</td>
            <td>{{$value->adminEmail}}</td>
            <td><img width="10%" src="{{asset($value->adminImage)}}" class="img-circle" alt="#"></td>
            <td>{{$value->adminAddress}}</td>
            <td>
                <a href="{{url('/backend/admin/restoreAdmin')}}/{{$value->adminId}}"><button class="btn btn-success"><i class="fas fa-undo"></i></button></a>
                <a href="{{url('/backend/admin/forcedeleteAdmin')}}/{{$value->adminId}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
</div>
@endsection
@endsection
<script>
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>