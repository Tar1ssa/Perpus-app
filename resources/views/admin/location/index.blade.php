@extends('admin.app')
@section('pagetitle', 'Location')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('location.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Lokasi</th>
                            <th>label</th>
                            <th>Rak</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->location_code }}</td>
                            <td>{{ $valuedatas->label }}</td>
                            <td>{{ $valuedatas->shelf }}</td>
                            <td>
                                <a href="{{ route('location.edit',$valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form onclick="return confirm('Yakin ingin menghapus ?')" action="{{ route('location.delete', $valuedatas->id) }}" method="post" class="d-inline">
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


