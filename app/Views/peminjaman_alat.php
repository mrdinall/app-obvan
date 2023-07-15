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
                        <table id="dinallTable" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Barang</th>
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

                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($peminjaman as $i) : ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $i['tanggal']; ?></td>
                                        <td>

                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">Nama Barang</th>
                                                    <th class="text-center">Merk</th>
                                                    <th class="text-center">S.N</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>

                                                <?php foreach ($parentMerk as $j) : ?>
                                                    <?php if ($i['id'] == $j['id_pinjaman_alat']) : ?>
                                                        <tr>

                                                            <td class="text-center"><?= $j['nama_barang']; ?></td>
                                                            <td class="text-center"><?= $j['merk']; ?></td>
                                                            <td class="text-center"><?= $j['serial_number']; ?></td>
                                                            <td class="text-center"><?= $j['jumlah']; ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </table>

                                        </td>
                                        <td><?= $i['acara']; ?></td>
                                        <td><?= $i['tempat']; ?></td>
                                        <td><?= $i['durasi_pinjam']; ?></td>
                                        <td><?= $i['nama_peminjam']; ?></td>
                                        <td><?= $i['nama_pemberi']; ?></td>
                                        <td><?= $i['tanggal_pengembalian']; ?></td>
                                        <td><?= $i['nama_penerima']; ?></td>
                                        <td><?= $i['catatan']; ?></td>
                                        <td><a href="<?= $i['id']; ?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i>Edit</a></td>
                                        <td>
                                            <form action="/peminjaman_alat/<?= $i['id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick=" return confirm('Apakah Anda Yakin?');"><i class="fa-solid fa-trash"></i>Hapus</button>
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