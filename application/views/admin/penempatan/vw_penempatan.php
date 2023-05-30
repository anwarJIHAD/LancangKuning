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
                            <a href="<?= base_url('Pmi_penempatan/tambah/') ?>"
                                class="btn btn-secondary float-left">TAMBAH
                                Penempatan PMI</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin </th>
                                        <th>Pendidikan</th>
                                        <th>NIK</th>
                                        <th>No Paspor</th>
                                        <th>Skema/P3MI</th>
                                        <th>Sektor Usaha</th>
                                        <th>Alamat Asal</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Negara Tujuan</th>
                                        <th>Jabatan</th>
                                        <th>Company</th>
                                        <th>No HP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($penempatan as $us): ?>
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
                                                <?= $us['pendidikan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['nik']; ?>
                                            </td>
                                            <td>
                                                <?= $us['no_paspor']; ?>
                                            </td>
                                            <td>
                                                <?= $us['skema']; ?>
                                            </td>
                                            <td>
                                                <?= $us['sektor_usaha']; ?>
                                            </td>
                                            <td>
                                                <?= $us['alamat_asal']; ?>
                                            </td>
                                            <td>
                                                <?= $us['kabupaten']; ?>
                                            </td>
                                            <td>
                                                <?= $us['negara_tujuan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['jabatan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['company']; ?>
                                            </td>
                                            <td>
                                                <?= $us['no_hp']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Pmi_penempatan/hapus/') . $us['id_penempatan']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Pmi_penempatan/edit/') . $us['id_penempatan']; ?>"
                                                    class="badge badge-warning">Edit</a>
                                                <!-- <a href="<?= base_url('Pmi_penempatan/detail/') . $us['id_penempatan   ']; ?>"
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