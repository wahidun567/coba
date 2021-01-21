<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a href="/orang/create" class="btn btn-primary mt-3">Tambah Daftar Orang</a>
<h2 class="judul bg-info mt-2">Kumpulan Daftar Orang</h2>
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
            <th class="text-left" scope="col">Nama Lengkap</th>
            <th text-center" scope="col">alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (5 * ($currentpage - 1)); ?>
        <?php foreach ($orang as $o) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td class="text-left"><?= $o['nama']; ?></td>
                <td class="text-left"><?= $o['alamat']; ?></td>
                <td>
                    <a href="/orang/edit/<?= $o['id']; ?>" class="btn btn-warning mr-2 mb-2 ml-2 mt-3">Edit</a>
                    <form action="/orang/<?= $o['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger mb-2 mt-3" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pager->links('orang', 'orang_pagination'); ?>
<?= $this->endSection(); ?>