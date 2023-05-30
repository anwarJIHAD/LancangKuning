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
                            <a href="<?= base_url('admin/tambah/') ?>" class="btn btn-secondary float-left">TAMBAH
                                PENCARI KERJA</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin </th>
                                        <th>Usia</th>
                                        <th>Daerah Asal</th>
                                        <th>Pendidikan</th>
                                        <th>Negara Tujuan</th>
                                        <th>Sektor Pekerjaan</th>
                                        <th>Nomor Kontak</th>
                                        <th>Informasi Yang Dibutuhkan</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pkln as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $us['jenis_kelamin']; ?>
                                            </td>
                                            <td>
                                                <?= $us['usia']; ?>
                                            </td>
                                            <td>
                                                <?= $us['daerah_asal']; ?>
                                            </td>
                                            <td>
                                                <?= $us['pendidikan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['negara_tujuan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['sektor_pekerjaan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['no_kontak']; ?>
                                            </td>
                                            <td>
                                                <?= $us['informasi']; ?>
                                            </td>
                                            <td>
                                                <?= $us['keterangan']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Pkln/hapus/') . $us['id_pkln']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Pkln/edit/') . $us['id_pkln']; ?>"
                                                    class="badge badge-warning">Edit</a>
                                                <!-- <a href="<?= base_url('Pkln/detail/') . $us['id_pkln']; ?>"
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