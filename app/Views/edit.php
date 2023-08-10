<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> Update Form Peminjaman Alat</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">

                        <form action="/peminjaman_alat/update/<?= $dataPinjam['id_pinjam']; ?>" method="post">

                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" id="idGetForJs" placeholder="Nama Barang" value="<?= $dataPinjam['id_pinjam']; ?>">
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tanggal" id="tanggal" name="tanggal" value="<?= $dataPinjam['tanggal']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                <button type="button" class="btn btn-primary btnAddFormEdit"><i class="fa-solid fa-plus"></i></button>
                                    <table class="table formTambahEdit">
                                        <?php foreach ($allDataParentMerk as $i) : ?>
                                            <tr>

                                                <input type="hidden" class="form-control" name="idParentMerk[]" placeholder="Nama Barang" value="<?= $i['id']; ?>">

                                                <td>
                                                    <input type="text" class="form-control" name="naBarEdit[]" placeholder="Nama Barang" value="<?= $i['nama_barang']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="merkEdit[]" placeholder="Merk" value="<?= $i['merk']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="sNEdit[]" placeholder="Serial Number" value="<?= $i['serial_number']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="jumlahEdit[]" placeholder="Jumlah" value="<?= $i['jumlah']; ?>">
                                                </td>
                                                <td>
                                                <?php if (array_slice($allDataParentMerk,1)): ?>                                          
                                                <button type="button" class="btn btn-danger btnHapusFormEdit" value="<?= $i['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                                <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="acara" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Acara" id="acara" name="acara" value="<?= $dataPinjam['acara']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tempat" id="tempat" name="tempat" value="<?= $dataPinjam['tempat']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_pinjam" class="col-sm-2 col-form-label">Durasi Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Durasi Pinjam" id="durasi_pinjam" name="durasi_pinjam" value="<?= $dataPinjam['durasi_pinjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam" value="<?= $dataPinjam['nama_peminjam']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Nama Pemberi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Pemberi" id="nama_pemberi" name="nama_pemberi" value="<?= $dataPinjam['nama_pemberi']; ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?= $this->include('layout/footer'); ?>


    </div>
</div>
<?= $this->endSection('content'); ?>