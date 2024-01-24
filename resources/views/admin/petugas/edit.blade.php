@extends('templates.admin_templates.main')

@section('title', 'Edit Masyarakat')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Petugas</h1>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">NIK Petugas : {{ $user->nik.' - '.$user->name }}</h6> 
        </div>
        <div class="card-body">
            <form action="/admin/user/{{ $user->id }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $user->nik }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ $user->telp }}">
                    @error('telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                        <option value="{{ $user->level }}">{{ $user->level }}</option>
                        <option value="Petugas">Petugas</option>
                        <option value="Admin">Admin</option>
                    </select>
                    @error('level')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="card-footer">
            <a onclick="window.history.back()" style="cursor: pointer;color: #fff" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit</button>
        </div>
        </form>
    </div>
</div>
@endsection