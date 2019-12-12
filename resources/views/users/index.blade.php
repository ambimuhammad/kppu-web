@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen User</h1>
                @can('create users')
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah
                    User Baru</a>
                @endcan
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen User</li>
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
                        <h3 class="card-title">Manajemen User</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Role</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($users as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @foreach ($row->getRoleNames() as $role)
                                            <label for="" class="badge badge-info">{{ $role }}</label>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($row->status)
                                            <label class="badge badge-success">Aktif</label>
                                            @else
                                            <label for="" class="badge badge-default">Suspend</label>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">

                                                @can('show users')
                                                <a href="{{ route('users.roles', $row->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-user-secret"></i></a>
                                                @endcan

                                                @can('edit users')
                                                <a href="{{ route('users.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                @endcan

                                                @can('delete users')
                                                <button class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
