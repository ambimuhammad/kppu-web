@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.css') }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen Service</h1>
                @can('create '.\Request::segment(2))
                <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                    Tambah Client</a>
                @endcan
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Client</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Client</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped" id="table-client">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Image</th>
                                    <th>Nama Client</th>
                                    <th>URL Client</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('js/Client/datatable-client.min.js') }}"></script>
@endpush