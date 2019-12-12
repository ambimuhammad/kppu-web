@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
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
                        <h3 class="card-title">Tambah User</h3>
                    </div>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}"
                                    required>
                                    <option value="">Pilih</option>
                                    @foreach ($role as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('role') }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-send"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
