@extends('admin.app')
@section('pagetitle', 'Transaksi')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Anggota</th>
                                <th>No. Transaksi</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Note</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $keydatas => $valuedatas)
                                <tr>
                                <td>{{ $keydatas += 1 }}</td>
                                <td>{{ $valuedatas->nomor_anggota }}</td>
                                <td>{{ $valuedatas->nik }}</td>
                                <td>{{ $valuedatas->nama }}</td>
                                <td>{{ $valuedatas->phone }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit',$valuedatas->id) }}" class="btn btn-success">Edit</a>
                                    <form onclick="return confirm('Yakin ingin menghapus ?')" action="{{ route('member.softdelete', $valuedatas->id) }}" method="post" class="d-inline">
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
</div>
@endsection


