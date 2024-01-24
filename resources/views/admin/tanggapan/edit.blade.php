@extends('templates.admin_templates.main')

@section('title', 'Edit Tanggapan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Tanggapan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ID Tanggapan : {{ $tanggapan->id }}</h6>
        </div>
        <div class="card-body">
            <form action="/admin/tanggapan/{{ $tanggapan->id }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="tanggapan">Tanggapan</label>
                <textarea name="tanggapan" id="tanggapan" cols="30" rows="10" class="form-control @error('tanggapan') is-invalid @enderror">{{ $tanggapan->tanggapan }}</textarea>
                @error('tanggapan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="{{ $tanggapan->pengaduan->status }}">{{ $tanggapan->pengaduan->status }}</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <a onclick="window.history.back();" style="color: #fff;cursor: pointer" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit Tanggapan</button>
            </form>
        </div>
    </div>

</div>
@endsection