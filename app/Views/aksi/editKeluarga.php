<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h2 class="bg-warning my-3">Form Ubah Data Keluarga</h2>
<!-- < ?= $validation->listErrors ; ? > -->
<form action="/Keluarga/update/<?= $keluarga['id']; ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $keluarga['slug']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $keluarga['foto_keluarga']; ?>">
    <div class="row mb-3">
        <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="namaLengkap" name="nama_lengkap" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $keluarga['nama_lengkap']; ?>" autofocus>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('nama_lengkap'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-10">
            <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $keluarga['nik']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('nik'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis-Kelamin</label>
        <div class="col-sm-10">
            <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenisKelamin" name="jenis_kelamin" aria-label="Default select example">
                <option selected value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : $keluarga['jenis_kelamin']; ?>">Tekan Ini Untuk Memilih Menu</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jenis_kelamin'); ?>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempatLahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $keluarga['tempat_lahir']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('tempat_lahir'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggal_lahir" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $keluarga['tanggal_lahir']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('tanggal_lahir'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama" value="<?= (old('agama')) ? old('agama') : $keluarga['agama']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('agama'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" id="pendidikan" name="pendidikan" value="<?= (old('pendidikan')) ? old('pendidikan') : $keluarga['pendidikan']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('pendidikan'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenisPekerjaan" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : ''; ?>" id="jenisPekerjaan" name="jenis_pekerjaan" value="<?= (old('jenis_pekerjaan')) ? old('jenis_pekerjaan') : $keluarga['jenis_pekerjaan']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jenis_pekerjaan'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fotoKeluarga" class="col-sm-2 col-form-label">Pilih Foto Anda</label>
        <div class="col-sm-10">
            <input class="form-control <?= ($validation->hasError('foto_keluarga')) ? 'is-invalid' : ''; ?>" type="file" id="fotoKeluarga" name="foto_keluarga" value="<?= (old('foto_keluarga')) ? old('foto_keluarga') : $keluarga['foto_keluarga']; ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('foto_keluarga'); ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary mb-2" type="submit">Ubah Data</button>
    <!-- <a href="keluarga/save" class="btn btn-primary mb-2">Tambah Data</a> -->
    <br>
    <a href="/pages/index" class="mb-5">Kembali Ke Menu Home</a>
</form>
<?= $this->endSection(); ?>