<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h2 class="bg-info mb-2 mt-3">Detail Keluarga</h2>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/imgKeluarga/<?= $keluarga['foto_keluarga']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body d-inline">
                <h3 class="card-title"><b><?= $keluarga['nama_lengkap']; ?></b></h3>
                <p class="card-text">
                    <b>NIK : </b><?= $keluarga['nik']; ?><br>
                    <b>Jenis Kelamin : </b><?= $keluarga['jenis_kelamin']; ?><br>
                    <b>Tempat Lahir : </b><?= $keluarga['tempat_lahir']; ?><br>
                    <b>Tanggal Lahir : </b><?= $keluarga['tanggal_lahir']; ?><br>
                    <b>Agama : </b><?= $keluarga['agama']; ?><br>
                    <b>Pendidikan : </b><?= $keluarga['pendidikan']; ?><br>
                    <b>Jenis Pekerjaan : </b><?= $keluarga['jenis_pekerjaan']; ?><br>
                </p>
                <p class="card-text">
                    <small class="text-muted">Last Updated : <?= $keluarga['updated_at']; ?></small><br>
                    <small class="text-muted">Last Created : <?= $keluarga['created_at']; ?></small>
                </p>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="/keluarga/edit/<?= $keluarga['slug']; ?>" class="btn btn-warning mr-2 ml-3 mt-3">Edit</a>
                            <form action="/keluarga/<?= $keluarga['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                            </form>

                            <br>
                            <a href="/keluarga/index">Kembali ke data keluarga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>