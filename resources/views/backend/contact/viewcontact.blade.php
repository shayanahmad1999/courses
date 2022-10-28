@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        @if (Session::get('delete'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @else
                            Contact Record
                        @endif
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-md-5">
                        <form action="" method="">
                            <div class="form-group form-inline">
                                <label for="">Search</label>
                                <input type="search" class="form-control" name="search" id=""
                                    aria-describedby="helpId" placeholder="Search">
                                <a href="{{ route('backend.contact.viewcontact') }}"><button type="button"
                                        class="btn btn-secondary">Reset</button></a>
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
                    <th class="th-sm">Message</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $value)
                    <tr>
                        <td>{{ $value->contactName }}</td>
                        <td>{{ $value->contactEmail }}</td>
                        <td>{{ $value->contactMessage }}</td>
                        <td>
                            <a href="{{ url('backend/contact/deletecontact') }}/{{ $value->contactId }}"><button
                                    class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{$userView->links()}} --}}
@endsection
@endsection
