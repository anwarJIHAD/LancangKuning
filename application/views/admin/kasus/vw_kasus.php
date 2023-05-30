<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php echo $judul ?>
                    </h1>
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
                            <a href="<?= base_url('Kasus/tambah/') ?>" class="btn btn-secondary float-left">TAMBAH
                                DATA KASUS</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama PMI</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>No Paspor</th>
                                        <th>Alamat</th>
                                        <th>Negara Penempatan</th>
                                        <th>Jenis Kasus</th>
                                        <th>P3MI</th>
                                        <th>Uraian Kasus</th>
                                        <th>Penyelesaian</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kasus as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['nama_pmi']; ?>
                                            </td>
                                            <td>
                                                <?= $us['tgl_pengaduan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['no_paspor']; ?>
                                            </td>
                                            <td>
                                                <?= $us['alamat']; ?>
                                            </td>
                                            <td>
                                                <?= $us['negara_penempatan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['jenis_kasus']; ?>
                                            </td>
                                            <td>
                                                <?= $us['p3mi']; ?>
                                            </td>
                                            <td>
                                                <?= $us['uraian_kasus']; ?>
                                            </td>
                                            <td>
                                                <?= $us['penyelesaian']; ?>
                                            </td>
                                            <td>
                                                <?= $us['keterangan']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Kasus/hapus/') . $us['id_kasus']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Kasus/edit/') . $us['id_kasus']; ?>"
                                                    class="badge badge-warning">Edit</a>
                                                <!-- <a href="<?= base_url('Kasus/detail/') . $us['id_kasus']; ?>"
                                                    class="badge badge-info">Detail</a> -->
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>