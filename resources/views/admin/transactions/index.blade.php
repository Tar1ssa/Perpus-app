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
                                <td>{{ $valuedatas->memberName->nama }}</td>
                                <td>{{ $valuedatas->trans_number }}</td>
                                <td>{{ $valuedatas->return_date }}</td>
                                <td>{{ $valuedatas->note }}</td>
                                <td>
                                    <a href="{{ route('transactions.show', $valuedatas->id) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form onclick="return confirm('Yakin ingin menghapus ?')" action="{{ route('transactions.destroy', $valuedatas->id) }}" method="post" class="d-inline">
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


