@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
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
                            <h3>User Trash Record</h3>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('backend.user.viewUser') }}"><button class="btn btn-info"><i
                                    class="fas fa-eye">View</i></button></a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewtrash as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <a href="{{url('/backend/user/restoreUser') }}/{{ $value->id }}"><button class="btn btn-success"><i
                                        class="fas fa-undo"></i></button></a>
                            <a href="{{url('backend/user/forceDeleteUser') }}/{{ $value->id }}"><button class="btn btn-danger"><i
                                        class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{$AdminView->links()}} --}}
@endsection
@endsection

