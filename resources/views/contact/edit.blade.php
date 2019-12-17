@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen Contact</h1>
                <a href="{{ route('contact.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- /.card-header -->
        <form role="form" action="{{ route('contact.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Contact</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}"
                                    name="alamat" value="{{ old('alamat') ?? $contact->alamat }}" placeholder="Alamat">
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                                    name="email" value="{{ old('email') ?? $contact->email }}" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control {{ $errors->has('telepon') ? 'is-invalid':'' }}"
                                    name="telepon" value="{{ old('telepon') ?? $contact->telepon }}"
                                    placeholder="Nomor Telepon">
                                @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="text" class="form-control {{ $errors->has('fax') ? 'is-invalid':'' }}"
                                    name="fax" value="{{ old('fax') ?? $contact->fax }}" placeholder="Nomor Fax">
                                @error('fax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="google_maps_api_key">Google Maps Api Key</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('google_maps_api_key') ? 'is-invalid':'' }}"
                                    name="google_maps_api_key"
                                    value="{{ old('google_maps_api_key') ?? $contact->google_maps_api_key }}"
                                    placeholder="Google Maps Api Key">
                                @error('google_maps_api_key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="text-red">Kosongkan jika tidak ada</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('script')
<script src="{{ asset('js/about/component-contact.min.js') }}"></script>
@endpush