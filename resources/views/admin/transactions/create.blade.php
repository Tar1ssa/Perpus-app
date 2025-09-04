@extends('admin.app')
@section('pagetitle', "Tambah Transaksi")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @foreach ($errors->all() as $keyerror)
                <ul style="background-color: red">
                    <li>{{ $keyerror }}</li>
                </ul>
            @endforeach
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('transactions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Tanggal Pengembalian</label>

                                </div>
                                <div class="col-sm-7">
                                <input type="date" class="form-control" name="return_date"  value="">
                                </div>
                            </div>

                            <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Catatan</label>

                                </div>
                                <div class="col-sm-7">
                                    <textarea class='form-control' name="note" id=""></textarea>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">No.Transaksi</label>

                                </div>
                                <div class="col-sm-7">
                                <input type="text" class="form-control" name="trans_number" readonly value="{{ $trans_number }}">
                                </div>
                            </div>

                             <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Anggota</label>

                                </div>
                                <div class="col-sm-7">
                                <select name="id_anggota" id="id_anggota" class="form-control">
                                    <option value="" selected disabled>--Pilih Anggota--</option>
                                    @foreach ($members as $keymembers)
                                        <option value="{{ $keymembers->id }}">{{ $keymembers->nama }}</option>
                                    @endforeach

                                </select>
                                </div>
                            </div>

                            <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Kategori Buku</label>

                                </div>
                                <div class="col-sm-7">
                                <select name="id_category" id="id_category" class="form-control">
                                    <option value="" selected disabled>--Pilih Kategori--</option>
                                    @foreach ($categories as $keycategories)
                                        <option value="{{ $keycategories->id }}">{{ $keycategories->category_name }}</option>
                                    @endforeach

                                </select>
                                </div>
                            </div>

                            <div class="col-mb-3 row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Buku</label>

                                </div>
                                <div class="col-sm-7">
                                <select name="id_books" id="id_books" class="form-control">
                                    {{-- <option value="" selected disabled>--Pilih Buku--</option> --}}

                                </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 mt-5">
                        <div class="mb-3" align='right'>
                            <button type="button" id='addRow' class="btn btn-sm btn-success">
                                <i class="bi bi-plus-lg"></i> Tambah Row</button>
                        </div>
                        <table class="table table-bordered" id='tableTrans'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id='tableBody'></tbody>
                        </table>
                    </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('transactions') }}">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


