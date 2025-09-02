@extends('admin.app')
@section('pagetitle', 'Books')
@section('content')

<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->location->location_code . '-' . $valuedatas->location->label . '-' . $valuedatas->location->shelf }}</td>
                            <td>{{ $valuedatas->category->category_name }}</td>
                            <td>{{ $valuedatas->title }}</td>
                            <td>{{ $valuedatas->writer }}</td>
                            <td>{{ $valuedatas->publisher }}</td>
                            <td>{{ $valuedatas->publish_year }}</td>
                            <td>{{ $valuedatas->description }}</td>
                            <td>{{ $valuedatas->stock }}</td>
                            <td>
                                <a href="{{ route('books.edit',$valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form onclick="return confirm('Yakin ingin menghapus ?')" action="{{ route('books.destroy', $valuedatas->id) }}" method="post" class="d-inline">
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


