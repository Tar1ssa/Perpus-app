@extends('admin.app')
@section('pagetitle', "Edit Roles")
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
                <form action="{{ route('roles.update', $edit->id) }}" method="post">
                    @csrf
                     @method('PUT')
                    <div class="mb-3">
                    <label for="" class="form-label">Nama Role</label>
                    <input type="text" class="form-control" placeholder="Input nama Roles" required name="name" value="{{ $edit->name }}">
                    </div>

    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="{{ route('roles.index') }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
