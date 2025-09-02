@extends('admin.app')
@section('pagetitle', 'Restore Member')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No.Anggota</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member_r as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->nomor_anggota }}</td>
                            <td>{{ $valuedatas->nik }}</td>
                            <td>{{ $valuedatas->nama }}</td>
                            <td>{{ $valuedatas->phone }}</td>
                            <td>{{ $valuedatas->email }}</td>
                            <td>
                                <a href="{{ route('member.restored',$valuedatas->id) }}" class="btn btn-success">Restore</a>
                                <form action="{{ route('members.destroy', $valuedatas->id) }}" method="post" class="d-inline">
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


