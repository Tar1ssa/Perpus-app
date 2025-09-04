@extends('admin.app')
@section('pagetitle', 'Transaksi')
@section('content')
    <div class="row mt-3">
            <div class="mb-3" align="left">
                        <a href="{{ url('transactions') }}">Kembali</a>
            </div>
    <div class="col-lg-6">
        <div class="card">
        <div class="card-body">
                <div class="card-title">Data Transaksi</div>
            <table>
            <tr>
                <th>Nomor Transaksi</th>
                <td>{{ $borrow->trans_number ?? 'error' }}</td>
            </tr>
            <tr>
                <th>Tanggal Pemimjaman</th>
                <td>{{ \Carbon\Carbon::parse($borrow->created_at)->format('d-m-Y') ?? 'error' }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengembalian</th>
                <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d-m-Y') ?? 'error' }}</td>
            </tr>
        </table>
            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Data Anggota</div>
                <table>
                <tr>
                    <th>Nama Anggota</th>
                    <td>{{ $borrow->memberName->nama ?? 'error' }}</td>
                </tr>
                <tr>
                    <th>No.Hp</th>
                    <td>{{ $borrow->memberName->phone ?? 'error' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $borrow->memberName->email ?? 'error' }}</td>
                </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">

    <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Detail Pinjaman</div>
                    <table class="table table-bordered" id='tableTrans'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                            </tr>
                        </thead>
                        <tbody id='tableBody'>
                            @foreach ($borrow->detailBorrow as $index=>$detail)
                            <tr>
                                <td>{{ $index+=1 }}</td>
                                <td>{{ $detail->books->title }}</td>
                                <td>{{ $detail->books->publisher }}</td>
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
