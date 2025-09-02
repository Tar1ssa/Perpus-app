@extends('admin.app')
@section('pagetitle', "Edit Buku")
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
                <form action="{{ route('books.update', $edit->id) }}" method="post">
                    @csrf
                     @method('PUT')
                    <div class="mb-3">
                    <label for="" class="form-label">Kode Lokasi</label>
                    <select class="form-select" name="id_location" id="">
                        <option value="" selected disabled>--Pilih Lokasi--</option>
                        @foreach ($location as $keylocation)
                            <option {{ $keylocation->id == $edit->id_location ? 'selected' : '' }} value="{{ $keylocation->id }}">{{ $keylocation->location_code . '-' . $keylocation->label . '-' . $keylocation->shelf}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    <select class="form-select" name="id_category" id="">
                        <option value="" selected disabled>--Pilih Kategori--</option>
                        @foreach ($category as $keycategory)
                            <option @if ($keycategory->id == $edit->id_category)
                                selected
                            @endif value="{{ $keycategory->id }}">{{ $keycategory->category_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Judul</label>
                    <input type="text" class="form-control" placeholder="Input judul" required name="title" value="{{ $edit->title }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Penulis</label>
                    <input type="text" class="form-control" placeholder="Input penulis" required name="writer" value="{{ $edit->writer }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" placeholder="Input penerbit" required name="publisher" value="{{ $edit->publisher }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Tahun Terbit</label>
                    <input type="date" class="form-control" placeholder="Input tahun terbit" required name="publish_year" value="{{ $edit->publish_year }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" id="" placeholder="Masukkan deskripsi">{{ $edit->description }}</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Stock</label>
                    <input type="text" class="form-control" placeholder="Input stock" required name="stock" value="{{ $edit->stock }}">
                    </div>


    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="{{ url('books') }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
