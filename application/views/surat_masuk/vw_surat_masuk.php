<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Surat Masuk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <!-- <a href="<?= base_url('surat_masuk/tambah/') . $user['NIP']; ?>"
                                class="btn btn-secondary float-left">TAMBAHKAN DATA</a> -->
                            <div class="btn-group" id='pdf'>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='fa fa-download'></i>
                                    Export
                                </button>
                                <ul class="dropdown-menu" id='dropdowns'>
                                    <li><a class="dropdown-item bg-warning" style='text-align: center; margin:auto;'
                                            id='dropdown' href="<?= base_url('Surat_masuk/pdf/') ?>"><i
                                                class='fa fa-download'></i>PDF</a>
                                    </li>
                                    <li><a class="dropdown-item bg-success align-text-center" id='dropdown'
                                            style='margin:5px auto 5px auto ; text-align: center; '
                                            href="<?= base_url('Surat_masuk/export/') ?>"><i
                                                class='fa fa-download'></i>EXCEL</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Tanggal Terima</th>
                                        <th>Pengirim</th>
                                        <th>Perihal</th>
                                        <th>Surat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($surat_masuk as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['no_surat']; ?>
                                            </td>
                                            <td>
                                                <?= $us['tgl_kirim']; ?>
                                            </td>
                                            <td>
                                                <?= $us['tgl_terima']; ?>
                                            </td>
                                            <td>
                                                <?= $us['pengirim']; ?>
                                            </td>
                                            <td>
                                                <?= $us['perihal']; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'assets/img/pegawai/' . $us['surat']; ?>"><i
                                                        class="fa fa-download" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('surat_masuk/hapus/') . $us['id']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('surat_masuk/edit/') . $us['id']; ?>"
                                                    class="badge badge-warning">Edit</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script>