@extends('admin.app')
@section('pagetitle', 'Users')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Users</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->name }}</td>
                            <td>{{ $valuedatas->email }}</td>
                            <td>


                                    @foreach ($valuedatas->roles as $keyrole)
                                        <span class="badge text-bg-primary">{{ $keyrole->name }}</span>
                                    @endforeach

                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('users.roles',$valuedatas->id) }}" class="btn btn-primary">Tambah Roles</a>
                                <a href="{{ route('users.edit',$valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form onclick="return confirm('Yakin ingin menghapus ?')" action="{{ route('users.destroy', $valuedatas->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


