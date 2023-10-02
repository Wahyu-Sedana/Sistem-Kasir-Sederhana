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
                        <h4 class="card-title">Data Laporan</h4>
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
                                        <th>No Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($laporan as $l)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $l->no_transaksi }}</td>
                                            <td>{{ $l->tgl_transaksi }}</td>
                                            <td>{{ $l->total_bayar }}</td>
                                            <td>
                                                <a href="#edit{{ $l->id }}" class="btn btn-success text-white" data-toggle="modal">Detail</a>
                                                <a href="#delete{{ $l->id }}" class="btn btn-primary text-white" data-toggle="modal">Cetak</a>
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
</div>
</div>
</div>
@endsection
