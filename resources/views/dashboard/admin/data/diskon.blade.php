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
                            <h4 class="card-title">Setting Diskon</h4>
                            @foreach ($diskon as $dis)
                                <form action="/admin/diskon/edit/{{ $dis->id }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" name="total_belanja" value="{{ $dis->total_belanja }}"
                                                    placeholder="Total Belanja..." class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group mb-3">
                                                <input type="number" name="diskon" value="{{ $dis->diskon }}"
                                                    placeholder="Diskon..." class="form-control" required>
                                                <div class="input-group-append"><span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group mb-3">
                                                <button type="submit" class="btn btn-lg btn-primary"><span class="fa fa-check"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
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
