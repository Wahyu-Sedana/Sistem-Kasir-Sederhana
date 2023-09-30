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
                        <h4 class="card-title">Data Barang</h4>
                        <button class="btn btn-success mt-2 mb-2 text-white" data-toggle="modal"
                            data-target="#create">Add Barang</button>
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
                                        <th> Nama Barang</th>
                                        <th> Jenis Barang</th>
                                        <th> Harga</th>
                                        <th> Stok</th>
                                        <th>Terakhir Di Tambahkan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($barang as $semuabarang)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $semuabarang->nama_barang }}</td>
                                            <td>{{ $semuabarang->nama_jenis }}</td>
                                            <td>Rp. {{ number_format($semuabarang->harga) }}</td>
                                            <td>{{ $semuabarang->stok }}</td>
                                            <td>{{ $semuabarang->created_at }}</td>
                                            <td>
                                                <a href="#edit{{ $semuabarang->id }}" class="btn btn-warning text-white" data-toggle="modal">Edit</a>
                                                <a href="#delete{{ $semuabarang->id }}" class="btn btn-danger text-white" data-toggle="modal">Delete</a>
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
                    <form action="/admin/barang/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="name" name="nama_barang" class="form-control" placeholder="Enter jenis barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jenis Barang</label>
                            <select name="id_jenis" class="form-control" id="" required>
                                <option value="" hidden>---Pilih Jenis Barang---</option>
                                @foreach ($jenisbarang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" name="stok" placeholder="Stok..." class="form-control" required>
                            <div class="input-group-append"><span class="input-group-text">Pcs</span></div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga" placeholder="Harga..." class="form-control" required>
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
@foreach ($barang as $d)
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
                    <form action="/admin/barang/edit/{{ $d->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="name" name="nama_barang" value="{{ $d->nama_barang }}" class="form-control" placeholder="Enter jenis barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jenis Barang</label>
                            <select name="id_jenis" class="form-control" id="" required>
                                <option value="{{ $d->id_jenis }}">{{ $d->nama_jenis }}</option>
                                @foreach ($jenisbarang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" name="stok" value="{{ $d->stok }}" placeholder="Stok..." class="form-control" required>
                            <div class="input-group-append"><span class="input-group-text">Pcs</span></div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga" value="{{ $d->harga }}" placeholder="Harga..." class="form-control" required>
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
@foreach ($barang as $del)
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
                    <form action="/admin/barang/delete/{{ $del->id }}" method="POST">
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
