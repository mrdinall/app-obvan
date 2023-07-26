<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> Form Peminjaman Alat</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <form action="/peminjaman_alat/save" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambah">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="naBar[]" placeholder="Nama Barang">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="merk[]" placeholder="Merk">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="sN[]" placeholder="Serial Number">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btnAddForm"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="acara" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Acara" id="acara" name="acara">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tempat" id="tempat" name="tempat">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_pinjam" class="col-sm-2 col-form-label">Durasi Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Durasi Pinjam" id="durasi_pinjam" name="durasi_pinjam">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Nama Pemberi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Pemberi" id="nama_pemberi" name="nama_pemberi">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?= $this->include('layout/footer') ?>


    </div>
</div>
<?= $this->endSection('content'); ?>