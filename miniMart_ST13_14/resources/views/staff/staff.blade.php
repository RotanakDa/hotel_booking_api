@extends('master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Staff</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('index_add_staff') }}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>No.</th>
                                        <th>Staff_Name</th>
                                        <th>Telephone</th>
                                        <th>Dob</th>
                                        <th>Role</th>
                                        <th>roomId</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($staff as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->staffName }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->dob}}</td>
                                            <td>{{ $item->Role }}</td>
                                            <td>{{ $item->roomID }}</td>
                                            <td>
                                                <a href="{{ route('index_edit_staff').'?id='.$item->id }}">
                                                    <button class="btn btn-default">
                                                        <i class="far fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                                <a
                                                    href="#"
                                                    class="btn btn-danger"
                                                    onclick="deleteStaff({{ $item->id }})"
                                                >
                                                    <i class="far fa-trash-alt"></i>
                                                    delete
                                                </a>
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
    </div>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        function deleteStaff(id) {
            let delete_ = confirm('Do you want to delete ?')
            if (delete_) {
                window.location.href = "/admin/delete_staff?id=" + id;
            }
        }
    </script>
@endsection
