<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h2 class="bg-info my-3">Form Tambah Data Teman</h2>

<form action="/Teman/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row mb-3">
        <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="namaLengkap" name="nama_lengkap" autofocus value="<?= old('nama_lengkap'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('nama_lengkap'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis-Kelamin</label>
        <div class="col-sm-10">
            <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenisKelamin" name="jenis_kelamin" aria-label="Default select example">
                <option selected value="<?= old('jenis_kelamin'); ?>">Tekan Ini Untuk Memilih Menu</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jenis_kelamin'); ?>
            </div>
        </div>
    </div>
    <!-- <div class="row mb-3">
        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis-Kelamin</label>
        <div class="col-sm-10">
            <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenisKelamin" name="jenis_kelamin" aria-label="Default select example">
                <option>Tekan Ini Untuk Memilih Menu</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jenis_kelamin'); ?>
            </div>
        </div>
    </div> -->

    <div class="row mb-3">
        <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempatLahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('tempat_lahir'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('tanggal_lahir'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama" value="<?= old('agama'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('agama'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('alamat'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fotoTeman" class="col-sm-2 col-form-label">Pilih Foto Anda</label>
        <div class="col-sm-10">
            <input class="form-control <?= ($validation->hasError('foto_teman')) ? 'is-invalid' : ''; ?>" type="file" id="fotoTeman" name="foto_teman" value="<?= old('foto_teman'); ?>">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('foto_teman'); ?>
            </div>
        </div>
    </div>


    <button class="btn btn-primary mb-2">Tambah data</button>
    <br>
    <a href="/pages/index">Kembali Ke Menu Home</a>
</form>
<?= $this->endSection(); ?>