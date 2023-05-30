<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800">
                        <?php echo $judul; ?><br>
                        <a href="<?= base_url('Pmi_ilegal') ?>" class="btn btn-success">selesai</a>
                    </h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card" style="padding: 10px;">
                        <!-- /.card-header -->
                        <h6><strong>Nama Pelaksana :</strong>
                            <?php echo $pelaksana['nama_pelaksana'] ?>
                        </h6>
                        <h6><strong>Tanggal Pelaksanaan :</strong>
                            <?php echo $pelaksana['tgl_pelaksanaan'] ?>
                        </h6>
                        <h6><strong>TKP :</strong>
                            <?php echo $pelaksana['TKP'] ?>
                        </h6>
                        <h6><strong>Instansi Penindak lanjut :</strong>
                            <?php echo $pelaksana['instansi_penindaklanjut'] ?>
                        </h6>
                        <h6><strong>Kronologi Pencegahan :</strong>
                            <?php echo $pelaksana['kronologi_Pencegahan'] ?>
                        </h6>
                        <h6><strong>Lokasi Shelter:</strong>
                            <?php echo $pelaksana['lokasi_shelter'] ?>
                        </h6>

                    </div>
                </div>
            </div>
            <div class="row" style="padding:10px;">
                <!-- left column -->

                <div class="col-md-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            Data CPMI:
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Korban</th>
                                        <th>Daerah Asal Pmi</th>
                                        <th>Negara Tujuan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pmi as $us): ?>
                                        <tr align="center">
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $us['daerah_asal_pmi']; ?>
                                            </td>
                                            <td>
                                                <?= $us['negara_tujuan']; ?>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>




                <!-- left column -->
                <div class="col-md-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            Data Pelaku:
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Pelaku</th>
                                        <th>Peran</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelaku as $us): ?>
                                        <tr align="center">
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['nama_pelaku']; ?>
                                            </td>
                                            <td>
                                                <?= $us['peran']; ?>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>

        </div>

        <!-- modal -->
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>