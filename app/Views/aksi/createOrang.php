<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h2 class="bg-info my-3">Form Tambah Daftar Orang</h2>

<form action="/Orang/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row mb-3">
        <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="namaLengkap" name="nama" autofocus value="<?= old('nama'); ?>" placeholder="Masukkan Nama Lengkap Anda">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Masukkan Alamat Anda" >
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('alamat'); ?>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2">Tambah data</button>
    <br>
    <a href="/pages/index">Kembali Ke Menu Home</a>
</form>
<?= $this->endSection(); ?>