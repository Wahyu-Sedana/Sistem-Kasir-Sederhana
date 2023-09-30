@extends('layout.layout')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <button class="btn btn-success mt-2 mb-2 text-white" data-toggle="modal"
                            data-target="#create">Add User</button>
                        {{--  <div class="row">
                        <div class="col-sm-10">
                            <button class="btn btn-success mt-2 mb-2 text-white">Add User</button>
                        </div>
                        <div class="col-sm-2">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>  --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="#edit{{ $user->id }}" class="btn btn-warning text-white" data-toggle="modal">Edit</a>
                                                <a href="#delete{{ $user->id }}" class="btn btn-danger text-white" data-toggle="modal">Delete</a>
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
    <!-- #/ container -->

    <!-- Modal Create -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/user/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role" required>
                                <option value="" hidden>---Pilih Role---</option>
                                <option value="admin">admin</option>
                                <option value="kasir">kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    {{--  <button type="" class="btn btn-primary btn sweet-success"> changes</button>  --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($users as $d)
    <div class="modal fade" id="edit{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/user/edit/{{ $d->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="name" name="name" value="{{ $d->name }}" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{ $d->email }}" class="form-control" placeholder="Enter email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" value="{{ $d->password }}" class="form-control" placeholder="Password"
                                required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role" required>
                                <option value="" hidden>---Pilih Role---</option>
                                <option <?php if($d['role'] == "admin") echo "selected"; ?> value="admin">admin</option>
                                <option <?php if($d['role'] == "kasir") echo "selected"; ?>value="kasir">kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    {{--  <button type="" class="btn btn-primary"> changes</button>  --}}
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

<!-- Modal Edit -->
@foreach ($users as $del)
    <div class="modal fade" id="delete{{ $del->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/user/delete/{{ $del->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <h5>Apakah anda ingin menghapus data ini?</h5>
                        </div>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    {{--  <button type="" class="btn btn-primary"> changes</button>  --}}
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
