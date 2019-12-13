@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Role & Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Roles & Permission</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Permission</h3>
                    </div>
                    <form action="{{ route('users.add_permission') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Group Permission</label>
                                <input type="text" name="group_name"
                                    class="form-control {{ $errors->has('group_name') ? 'is-invalid':'' }}"
                                    placeholder="Group Permission" required>
                                <p class="text-danger">{{ $errors->first('group_name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                    placeholder="Name Permission" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm">
                                Add New
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Set Permission</h3>
                    </div>
                    <form action="{{ route('users.roles_permission') }}" method="GET">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Roles</label>
                                <div class="input-group">
                                    <select name="role" class="form-control">
                                        @foreach ($roles as $value)
                                        <option value="{{ $value }}"
                                            {{ request()->get('role') == $value ? 'selected':'' }}>
                                            {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger">Check!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if (!empty($permissions))
                    <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs mb-3">
                                        <li class="active">
                                            <a href="#tab_1" data-toggle="tab">Permissions</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            @php $no = 1; @endphp
                                            {{-- @foreach ($permissions as $key => $row)
                                            <input type="checkbox" name="permission[]" class="minimal-red"
                                                value="{{ $row }}"
                                            {{ in_array($row, $hasPermission) ? 'checked':'' }}> {{ $row }} <br>
                                            @if ($no++%5 == 0)
                                            <br>
                                            @endif
                                            @endforeach --}}
                                            <div class="row">
                                                @foreach ($permissions as $group)
                                                <div class="col-md-3">
                                                    <div class="card card-secondary">
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{ $group->name }}</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            @foreach ($group->permissions as $key => $row)
                                                            <input type="checkbox" name="permission[]"
                                                                class="minimal-red" value="{{ $row }}"
                                                                {{ in_array($row->name, $hasPermission) ? 'checked':'' }}>
                                                            {{ $row->name }} <br>
                                                            @if ($no++%5 == 0)
                                                            <br>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-send"></i> Set Permission
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection