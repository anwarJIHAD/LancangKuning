<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
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
                    <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data PMI</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_pmi" value="<?= $pmi_['id_pmi']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= $pmi_['nama']; ?>" class="form-control"
                                        id="nama" placeholder="Masukkan Nomor Surat">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">jenis kelamin</label>
                                    <input type="text" name="jenis_kelamin" value="<?= $pmi_['jenis_kelamin']; ?>"
                                        class="form-control" id="jenis_kelamin" placeholder="Masukkan Tanggal Kirim">
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" value="<?= $pmi_['tanggal_lahir']; ?>"
                                        class="form-control" id="tanggal_lahir" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Daerah Asal</label>
                                    <input type="text" name="alamat" value="<?= $pmi_['alamat'];?>" class="form-control"
                                        id="alamat" placeholder="Masukkan alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="negara_penempatan">Negara Penempatan</label>
                                    <input type="text" name="negara_penempatan"
                                        value="<?= $pmi_['negara_penempatan']; ?>" class="form-control"
                                        id="negara_penempatan" placeholder="Masukkan negara_penempatan">
                                    <?= form_error('negara_penempatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_datang">Tanggal Datang</label>
                                    <input type="text" name="tgl_datang" value="<?= $pmi_['tgl_datang']; ?>"
                                        class="form-control" id="tgl_datang" placeholder="Masukkan tgl_datang">
                                    <?= form_error('tgl_datang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pulang">Jenis pulang</label>
                                    <input type="text" name="jenis_pulang" value="<?= $pmi_['jenis_pulang'];?>"
                                        class="form-control" id="jenis_pulang" placeholder="Masukkan jenis_pulang">
                                    <?= form_error('jenis_pulang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" value="<?= $pmi_['provinsi']; ?>"
                                        class="form-control" id="provinsi" placeholder="Masukkan provinsi">
                                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="debarkas">debarkasi</label>
                                    <input type="text" name="debarkas" value="<?= $pmi_['debarkas']; ?>"
                                        class="form-control" id="debarkas" placeholder="Masukkan debarkas">
                                    <?= form_error('debarkas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= $pmi_['ket']; ?>"
                                        class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="<?= base_url('pmi') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">edit Data
                                    PMI</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div> --