@extends('admin.app')
@section('pagetitle', "Tambah Kategori")
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
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="Input nama kategori" required name="category_name" value="{{ old('categories_code') }}">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('categories/index') }}">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
