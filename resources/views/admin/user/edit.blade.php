@extends('admin.app')
@section('pagetitle', "Edit Users")
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
                <form action="{{ route('users.update', $edit->id) }}" method="post">
                    @csrf
                     @method('PUT')
                    <div class="mb-3">
                    <label for="" class="form-label">Nama User</label>
                    <input type="text" class="form-control" placeholder="Input nama users" required name="name" value="{{ $edit->name }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Email User</label>
                    <input type="email" class="form-control" placeholder="Input nama users" required name="email" value="{{ $edit->email }}">
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Input password" required name="password" value="">
                    <span class="text-muted">

                        <small>*Masukkan password baru untuk mengubah password</small>
                    </span>
                    </div>

    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="{{ route('users.index') }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
