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
                                    <th>Acara/Tempat</th>
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
                                    <th>Acara/Tempat</th>
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
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td><button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i>Edit</button></td>
                                    <td><button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Hapus</button></td>
                                </tr>
                            
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