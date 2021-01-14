<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h2 class="bg-info mb-2 mt-3">Detail Teman</h2>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/imgTeman/<?= $teman['foto_teman']; ?>" class="card-img my-2">
        </div>
        <div class="col-md-8">
            <div class="card-body d-inline">
                <h4 class="card-title"><b><?= $teman['nama_lengkap']; ?></b></h4>
                <p class="card-text">
                    <b>Jenis Kelamin : </b><?= $teman['jenis_kelamin']; ?><br>
                    <b>Tempat Lahir : </b><?= $teman['tempat_lahir']; ?><br>
                    <b>Tanggal Lahir : </b><?= $teman['tanggal_lahir']; ?><br>
                    <b>Agama : </b><?= $teman['agama']; ?><br>
                    <b>Alamat : </b><?= $teman['alamat']; ?><br>
                </p>
                <p class="card-text">
                    <small class="text-muted">Last Update : <?= $teman['updated_at']; ?></small><br>
                    <small class="text-muted">Last Created : <?= $teman['created_at']; ?></small>
                </p>
                <div class="container mb-3 ml-3">
                    <div class="row">
                        <div class="col">
                            <a href="/teman/edit/<?= $teman['slug']; ?>" class="btn btn-warning mr-2 mb-2 ml-2 mt-3">Edit</a>
                            <form action="/teman/<?= $teman['id']; ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger mb-2 mt-3" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                            </form>
                            <!-- <a href="/teman/delete/<?= $teman['id']; ?>" class="btn btn-danger mb-2">Delete</a> -->
                            <br>
                            <a href="/teman/index">Kembali ke data teman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>