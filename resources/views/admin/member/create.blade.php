@extends('admin.app')
@section('pagetitle', "Tambah Member")
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
                <form action="{{ route('members.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="" class="form-label">Nomor Anggota</label>
                    <input type="text" class="form-control" placeholder="No. Anggota" required name="nomor_anggota" value="{{ $code }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">NIK</label>
                    <input type="text" class="form-control" placeholder="Input NIK" required name="nik" value="{{ old('nik') }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Input nama" required name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">No. Handphone</label>
                    <input type="number" class="form-control" placeholder="Input nomor handphone" required name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Input email" required name="email" value="{{ old('email') }}">
                    </div>

    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="{{ url('members') }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
