@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        @if (Session::get('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('update') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @elseif(Session::get('trash'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <strong>{{ Session::get('trash') }}</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        @else
                            <h3>Admin Record</h3>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('backend.admin.addAdmin') }}"><button class="btn btn-info"><i
                                    class="fas fa-plus">Add</i></button></a>
                        <a href="{{route('backend.admin.trashAdmin') }}"><button class="btn btn-warning"><i
                                    class="fas fa-trash">Trash</i></button></a>
                    </div>
                    <div class="col-md-5">
                        <form action="" method="">
                            <div class="form-group form-inline">
                                <label for="">Search</label>
                                <input type="search" class="form-control" name="search" id=""
                                    aria-describedby="helpId" placeholder="Search">
                                    <a href="{{route('backend.admin.viewAdmin')}}"><button type="button" class="btn btn-secondary">Reset</button></a>
                            </div>
                        </form>
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
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AdminView as $value)
                    <tr>
                        <td>{{ $value->adminFirstName }}</td>
                        <td>{{ $value->adminLastName }}</td>
                        <td>{{ $value->adminEmail }}</td>
                        <td><img width="10%" src="{{ asset($value->adminImage) }}" class="img-circle" alt="#">
                        </td>
                        <td>{{ $value->adminAddress }}</td>
                        <td>
                            @if ($value->adminStatus == 1)
                                <a href="{{ url('/backend/admin/ChangeStatus') }}/{{ $value->adminId }}"><span
                                        class="badge badge-success">Active</span></a>
                            @else
                                <a href="{{ url('/backend/admin/ChangeStatus') }}/{{ $value->adminId }}"><span
                                        class="badge badge-danger">InActive</span></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('/backend/admin/deleteAdmin') }}/{{ $value->adminId }}"><button class="btn btn-warning"><i
                                        class="fas fa-trash"></i></button></a>
                            <a href="{{url('/backend/admin/editAdmin') }}/{{ $value->adminId }}"><button class="btn btn-primary"><i
                                        class="fas fa-edit"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$AdminView->links()}}
@endsection
@endsection

