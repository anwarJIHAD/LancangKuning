<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Berkas</h1>
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
                        <!-- <div class="card-header">
                            <a href="<?= base_url('surat_keluar/tambah/') . $user['NIP']; ?>"
                                class="btn btn-secondary float-left">TAMBAHKAN DATA</a>
                        </div> -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($berkas as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i ?>
                                            </td>
                                            <td>
                                                <?= $us['NIP']; ?>
                                            </td>
                                            <td>
                                                <?= $us['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $us['keterangan']; ?>
                                            </td>


                                            <td>
                                                <a href="<?php echo base_url() . 'assets/img/pegawai/' . $us['file']; ?>"><i
                                                        class="fa fa-download" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Admin/hapuspangkat/') . $us['id']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Admin/editpangkat/') . $us['id']; ?>"
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