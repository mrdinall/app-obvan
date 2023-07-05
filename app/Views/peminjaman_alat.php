<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman Alat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Peminjaman Alat</li>
                </ol>
                <button type="button" class="btn btn-primary mb-2">Tambah</button>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                    <th>Jumlah</th>
                                    <th>Acara</th>
                                    <th>Tempat</th>
                                    <th>Durasi Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Pemberi</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Nama Penerima</th>
                                    <th>Catatan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                    <th>Jumlah</th>
                                    <th>Acara</th>
                                    <th>Tempat</th>
                                    <th>Durasi Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Pemberi</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Nama Penerima</th>
                                    <th>Catatan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($peminjaman as $i) : ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $i['tanggal']; ?></td>
                                        <td><?= $i['merk']; ?></td>
                                        <td><img src="img/<?= $i['serial-number']; ?>" alt="" width="70px" height="40px"></td>
                                        <td><?= $i['jumlah']; ?></td>
                                        <td><?= $i['acara']; ?></td>
                                        <td><?= $i['tempat']; ?></td>
                                        <td><?= $i['durasi-pinjam']; ?></td>
                                        <td><?= $i['nama-peminjam']; ?></td>
                                        <td><?= $i['nama-pemberi']; ?></td>
                                        <td><?= $i['tanggal-pengembalian']; ?></td>
                                        <td><?= $i['nama-penerima']; ?></td>
                                        <td><?= $i['catatan']; ?></td>
                                        <td><a href="<?= $i['id']; ?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i>Edit</a></td>
                                        <td>
                                            <form action="/peminjaman_alat/<?= $i['id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?= $this->include('layout/footer') ?>
    </div>
</div>
<?= $this->endSection('content'); ?>