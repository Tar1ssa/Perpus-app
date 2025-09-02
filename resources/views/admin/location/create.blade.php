@extends('admin.app')
@section('pagetitle', "Tambah Lokasi")
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
                <form action="{{ route('location.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="" class="form-label">Kode Lokasi</label>
                    <input type="text" class="form-control" placeholder="Kode Lokasi" required name="location_code" value="{{ old('location_code') }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Label</label>
                    <input type="text" class="form-control" placeholder="Input label" required name="label" value="{{ old('label') }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Rak</label>
                    <input type="text" class="form-control" placeholder="Input Rak" required name="shelf" value="{{ old('shelf') }}">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('location/index') }}">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
