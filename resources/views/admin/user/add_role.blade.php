@extends('admin.app')
@section('pagetitle', "Edit Role User")
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
                <form action="{{ route('users.updateRole', $user->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="" class="form-label">Pilih Role</label>
                    <select name="roles[]" id="" class="form-control" multiple>
                        @foreach ($roles as $keyroles)
                        <option {{ $user->roles->contains($keyroles->id) ? 'selected' : ''}} value="{{ $keyroles->id }}">{{ $keyroles->name }}</option>
                        @endforeach
                    </select>
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
