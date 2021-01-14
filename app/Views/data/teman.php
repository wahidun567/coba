<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a href="/teman/create" class="btn btn-primary mt-3">Tambah Data Teman</a>
<h2 class="judul bg-info mt-2">Kumpulan Data Teman</h2>
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
        <?php $i = 1; ?>
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
<?= $this->endSection(); ?>