@extends('templates.public_templates.main')

@section('title', 'Edit Profil')

@section('content')
@if(session('pesan'))
<script>
    $(document).ready(function() {
        const notyf = new Notyf({
        types: [
            {
            type: 'success',
            duration: 5000
            }
        ]
        });
        
        notyf.success("{{ session('pesan') }}");
    });
</script>
@endif
<!--Edit Profile-->
<div class="account-wrapper">
    <div class="columns">

        <!--Navigation-->
        <div class="column is-4">
            <div class="account-box is-navigation">
                <div class="media-flex-center">
                    <div class="h-avatar is-large">
                        <img class="avatar" src="https://via.placeholder.com/150x150"
                            data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                    </div>
                    <div class="flex-meta">
                        <span>{{ Auth::user()->name }}</span>
                        <span>{{ Auth::user()->level }}</span>
                    </div>
                </div>
                <div class="account-menu">
                    <a onclick="personal_info()" class="account-menu-item is-active">
                        <i class="lnil lnil-user-alt"></i>
                        <span>General</span>
                        <span class="end">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!--Form-->
        <div class="column is-8" id="personal-info">
            <div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Info Akun</h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a href="/masyarakat" class="button h-button is-light is-dark-outlined">
                                    <span class="icon">
                                        <i class="lnir lnir-arrow-left rem-100"></i>
                                    </span>
                                    <span>Kembali</span>
                                </a>
                                <a onclick="edit_profil()" class="button h-button is-primary is-raised">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Foto Profil</h4>
                        </div>

                        <div class="h-avatar profile-h-avatar is-xl">
                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                        </div>
                    </div>
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Informasi Personal</h4>
                        </div>

                        <div class="columns is-multiline">
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" class="input" value="{{ Auth::user()->nik }}" disabled>
                                        <div class="form-icon">
                                            <i data-feather="credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" class="input" value="{{ Auth::user()->name }}" disabled>
                                        <div class="form-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" class="input" value="{{ Auth::user()->email }}" disabled>
                                        <div class="form-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="number" class="input" value="{{ Auth::user()->telp }}" disabled>
                                        <div class="form-icon">
                                            <i data-feather="smartphone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column is-8" id="edit-profil">
            <div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Info Akun</h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a onclick="personal_info()" class="button h-button is-light is-dark-outlined">
                                    <span class="icon">
                                        <i class="lnir lnir-arrow-left rem-100"></i>
                                    </span>
                                    <span>Kembali</span>
                                </a>
                                <form action="/masyarakat/edit_profil/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="button h-button is-primary is-raised">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Foto Profil</h4>
                        </div>
                        <style>
                            .custom-file-upload {
                                text-align: center;
                            }
                        </style>
                        <div class="h-avatar profile-h-avatar is-xl">
                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                            </div>
                        </div>
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Informasi Personal</h4>
                        </div>

                        <div class="columns is-multiline">
                                <label for="choose-file" class="column is-12 mt-3 input custom-file-upload dark-inverted dark-text" id="choose-file-label">
                                <i class="fa fa-cloud-upload-alt"></i>
                                Ganti Foto
                                </label>
                                <input name="foto" type="file" id="choose-file" style="display: none;" />
                                </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" name="nik" class="input @error('nik') is-invalid @enderror" value="{{ Auth::user()->nik }}">
                                        <div class="form-icon">
                                            <i data-feather="credit-card"></i>
                                        </div>
                                        @error('nik')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" name="name" class="input @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                                        <div class="form-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        @error('name')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="text" name="email" class="input @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">
                                        <div class="form-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                        @error('email')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control has-icon">
                                        <input type="number" name="telp" class="input @error('telp') is-invalid @enderror" value="{{ Auth::user()->telp }}">
                                        <div class="form-icon">
                                            <i data-feather="smartphone"></i>
                                        </div>
                                        @error('telp')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    $('#edit-profil').hide();
    function edit_profil(){
        $('#personal-info').hide();
        $('#edit-profil').fadeIn('fast');
    }
    function personal_info(){
        $('#edit-profil').hide();
        $('#personal-info').fadeIn('fast');
    }
</script>

@if($errors->any())
<script>
    $('#personal-info').hide();
    $('#edit-profil').fadeIn('fast');
</script>
@endif
@endsection
