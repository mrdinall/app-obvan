<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">

        <style>
            .error {
                color: var(--bs-danger);
            }
        </style>
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">

                </h5>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div class="card-body">

                        <form id="formAdd" method="post" action="/peminjaman_alat/save" class="needs-validation" novalidate>

                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Format kalender <?= date('d/m/Y') ?>" id="tanggal" name="tanggal" value="<?= date('d/m/Y') ?>">
                                    <span class="text-danger"> <?= validation_show_error('tanggal'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10 offset-sm-2">
                                    <table class="table formTambah">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Merk</th>
                                            <th class="text-center">S.N</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>

                                        <tr>
                                            <td class="rownumber">
                                                1
                                            </td>
                                            <td>
                                                <input type="text" required id="dinall-js-nabar-01052013" class="form-control" name="naBar[]" placeholder="Nama Barang" id="naBarang1">

                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number" value="<?= '-'; ?>">
                                            </td>
                                            <td>
                                                <input type="text" required id="dinall-js-jumlah-01052013" class="form-control" name="jumlah[]" placeholder="Jumlah">
                                            </td>
                                            <td>
                                                <button type="button" required class="btn btn-primary btnAddForm"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="acara" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Acara" id="acara" name="acara" value="<?= old('acara') ?>">


                                    <span class="text-danger"> <?= validation_show_error('acara'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Tempat" id="tempat" name="tempat" value="<?= old('tempat') ?>">
                                    <span class="text-danger"> <?= validation_show_error('tempat'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="durasi_pinjam" class="col-sm-2 col-form-label">Durasi Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Durasi Pinjam" id="durasi_pinjam" name="durasi_pinjam" value="<?= old('durasi_pinjam') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Nama Peminjam" id="nama_peminjam" name="nama_peminjam" value="<?= old('nama_peminjam') ?>">
                                    <span class="text-danger"> <?= validation_show_error('nama_peminjam'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Nama Pemberi</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Nama Pemberi" id="nama_pemberi" name="nama_pemberi" value="<?= old('nama_pemberi') ?>">
                                    <span class="text-danger"> <?= validation_show_error('nama_pemberi'); ?></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <script type="text/javascript">
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            //validation ok javascript
            $("#formAdd").validate({
                errorPlacement: function($error, $element) {
                    // $error.appendTo($element.closest("td").css({"color": "red"}));
                    $error.appendTo($element.closest("td"));
                },
                rules: {
                    'naBar[]': {
                        required: true
                    },
                    'merk[]': {
                        required: true
                    },
                    'sN[]': {
                        required: true
                    },
                    'jumlah[]': {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    'naBar[]': {
                        required: "nama harus di isi !"
                    },
                    'merk[]': {
                        required: "merk harus di isi !"
                    },
                    'sN[]': {
                        required: "serial number harus di isi !"
                    },
                    'jumlah[]': {
                        required: "jumlah harus di isi !",
                        digits: "isi dengan angka !"

                    }

                },
                errorElement: "em",



            });

            // jQuery.validator.addMethod("validDate", function(value, element) {
            //         return this.optional(element) || moment(value, "DD/MM/YYYY").isValid();
            //     }, "Please enter a valid date in the format DD/MM/YYYY");
        </script>
        <?= $this->include('layout/footer') ?>


    </div>
</div>


<?= $this->endSection('content'); ?>