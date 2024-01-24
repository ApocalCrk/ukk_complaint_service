@extends('templates.public_templates.main')

@section('title', 'Buat Aduan')

@section('content')
<!--Form Layout 1-->
<div class="form-layout">
    <div class="form-outer">
        <div class="form-header stuck-header">
            <div class="form-header-inner">
                <div class="left">
                    <h3>Buat Aduan</h3>
                </div>
                <div class="right">
                    <div class="buttons">
                        <a href="/masyarakat" class="button h-button is-light is-dark-outlined">
                            <span class="icon">
                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                </span>
                            <span>Kembali</span>
                        </a>
                        <form action="/masyarakat/pengaduan" method="POST" enctype="multipart/form-data">
                            @csrf
                        <button id="save-button" type="submit" class="button h-button is-primary is-raised">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-fieldset">
                <!-- <div class="fieldset-heading">
                    <h4>Personal Info</h4>
                    <p>This helps us to know you</p>
                </div> -->

                <div class="columns is-multiline">
                    <div class="column is-12">
                        <div class="field">
                            <label>Judul Aduan</label>
                            <div class="control">
                                <input type="text" class="input @error('judul_laporan') is-invalid @enderror" id="judul_laporan" name="judul_laporan">
                            </div>
                            @error('judul_laporan')
                                <div class="danger-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="field">
                            <label>Isi Aduan</label>
                            <div class="control">
                                <textarea name="isi_laporan" cols="30" rows="10" class="textarea @error('isi_laporan') is-invalid @enderror" id="isi_laporan"></textarea>
                            </div>
                            @error('isi_laporan')
                                <div class="danger-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <style>
                        .custom-file-upload {
                            text-align: center;
                        }
                    </style>
                    <div class="column is-12">
                        <div class="field">
                            <label>Foto</label>
                            <label for="choose-file" class="column is-12 input custom-file-upload dark-inverted dark-text" id="choose-file-label">
                                <i class="fa fa-cloud-upload-alt"></i>
                                Pilih Gambar
                            </label>
                            <input name="foto" type="file" class="@error('foto') is-invalid @enderror" id="choose-file" style="display: none;" />
                            </div>
                            @error('foto')
                                <div class="danger-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection