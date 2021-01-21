<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a href="/teman/create" class="btn btn-primary mt-3">Tambah Data Teman</a>
<h2 class="judul bg-info mt-2">Kumpulan Data Teman</h2>
<div class="row">
    <div class="col-5 ">
        <form action="" method="post">
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian..." name="keyword">
                <div class="input-group-append">
                    <button class="input-group-text" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success pb-0 mt-2" role="alert">
        <h5><?= session()->getFlashdata('pesan'); ?></h5>
    </div>
<?php endif; ?>

<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Agama</th>
            <th scope="col">alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
        <?php foreach ($teman as $t) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $t['nama_lengkap']; ?></td>
                <td><?= $t['jenis_kelamin']; ?></td>
                <td><?= $t['tempat_lahir']; ?></td>
                <td><?= $t['tanggal_lahir']; ?></td>
                <td><?= $t['agama']; ?></td>
                <td><?= $t['alamat']; ?></td>
                <td><a href="/teman/<?= $t['slug']; ?>" class="btn btn-success">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pager->links('teman', 'teman_pagination'); ?>

<?= $this->endSection(); ?>