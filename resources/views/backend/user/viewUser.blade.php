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
                            <h3>User Record</h3>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('backend.user.addUser') }}"><button class="btn btn-info"><i
                                    class="fas fa-plus">Add</i></button></a>
                        <a href="{{route('backend.user.trashUser') }}"><button class="btn btn-warning"><i
                                    class="fas fa-trash">Trash</i></button></a>
                    </div>
                    <div class="col-md-5">
                        <form action="" method="">
                            <div class="form-group form-inline">
                                <label for="">Search</label>
                                <input type="search" class="form-control" name="search" id=""
                                    aria-describedby="helpId" placeholder="Search">
                                    <a href="{{route('backend.user.viewUser')}}"><button type="button" class="btn btn-secondary">Reset</button></a>
                            </div>
                        </form>
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
                @foreach ($userView as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <a href="{{url('backend/user/trashUser') }}/{{ $value->id }}"><button class="btn btn-warning"><i
                                        class="fas fa-trash"></i></button></a>
                            <a href="{{url('backend/user/editUser') }}/{{ $value->id }}"><button class="btn btn-primary"><i
                                        class="fas fa-edit"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$userView->links()}}
@endsection
@endsection

