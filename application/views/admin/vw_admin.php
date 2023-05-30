<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Data Pegawai</h1>
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
                            <a href="<?= base_url('admin/tambah/') ?>"
                                class="btn btn-secondary float-left">TAMBAHKAN PEGAWAI</a>
                        </div>
                        <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Foto</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status Pegawai</th>
                                        <th>Pangkat</th>
                                        <th>Jenis Jabatan</th>
                                        <!-- <th>Jabatan</th>
                                        <th>Unit Kerja</th> -->
                                        <!-- <th>Pendidikan Terakhir</th>
                                        <th>Status Aktif</th>
                                        <th>Pin Presensi</th>
                                        <th>Tanggal Terakhir Naik Pangkat</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user1 as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?>.</td>
                                        <td><img src="<?= base_url('assets/img/pegawai/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                        <td><?= $us['NIP']; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['role']; ?></td>
                                        <td><?= $us['pangkat']; ?></td>
                                        <td><?= $us['jenis_jabatan']; ?></td>
                                        <!-- <td><?= $us['jabatan']; ?></td>
                                        <td><?= $us['unit_kerja']; ?></td> -->
                                        <!-- <td><?= $us['pendidikan_terakhir']; ?></td>
                                        <td><?= $us['status_aktif']; ?></td>
                                        <td><?= $us['pin_presensi']; ?></td>
                                        <td><?= $us['tgl_akhir']; ?></td> -->
                             
                                        <td>
                                            <a href="<?= base_url('Admin/hapus/') . $us['NIP']; ?>"
                                                class="badge badge-danger">Hapus</a>
                                            <a href="<?= base_url('Admin/edit/') . $us['NIP']; ?>"
                                                class="badge badge-warning">Edit</a>
                                            <a href="<?= base_url('Admin/detail/') . $us['NIP']; ?>"
                                                class="badge badge-info">Detail</a>  
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>