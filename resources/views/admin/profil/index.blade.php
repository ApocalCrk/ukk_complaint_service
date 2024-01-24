@extends('templates.admin_templates.main')

@section('title', 'Edit Profil')

@section('content')
@if(session('pesan'))
<script>
    swal.fire({
        icon: 'success',
        title: "{{ session('pesan') }}",
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Profil</h1>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Info Personal</h6> 
        </div>

        <div id="profil">
            <div class="card-body">
                @foreach($user as $row)
                    <div class="text-center">
                        <img src="../storage/{{ $row->foto }}" class="rounded-circle" width="300">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $row->nik }}" readonly>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $row->name }}" readonly>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $row->email }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ $row->telp }}" readonly>
                        @error('telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror" disabled>
                            <option value="{{ $row->level }}">{{ $row->level }}</option>
                            <option value="Petugas">Petugas</option>
                            <option value="Admin">Admin</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endforeach
            </div>
            <div class="card-footer">
                <a onclick="window.history.back()" style="cursor: pointer;color: #fff" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
                <a onclick="change_edit()" class="btn btn-warning text-light"> <i class="fa fa-edit"></i> Edit Profil</a>
            </div>
            </form>
        </div>
        
        <div id="edit">
            <div class="card-body">
                @foreach($user as $user)
                <form action="/admin/edit_profil/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    <div class="text-center">
                        <img src="../storage/{{ $user->foto }}" class="rounded-circle" width="300">
                    </div>
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="foto">Ganti Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
                        <input name="level" id="level" class="form-control @error('level') is-invalid @enderror" value="{{ $user->level }}" readonly>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endforeach
            </div>
            <div class="card-footer">
                <a onclick="change_detail()" style="cursor: pointer;color: #fff" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
                <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit</button>
            </div>
            </form>
        </div>

    </div>
</div>

<script>
    $('#edit').hide();
    function change_edit(){
        $('#edit').show();
        $('#profil').hide();
    }

    function change_detail(){
        $('#edit').hide();
        $('#profil').show();
    }
</script>

@if($errors->any())
<script>
    $(document).ready(function() {
        $('#edit').show();
        $('#profil').hide();
    });
</script>
@endif
@endsection