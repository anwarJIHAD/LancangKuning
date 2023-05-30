<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800">
                        <?php echo $judul; ?>
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
                    <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data PMI</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= set_value('nama'); ?>"
                                        class="form-control" id="nama" placeholder="Masukkan Nama">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">jenis kelamin</label></br>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">--------------pilih jenis kelamin------------</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>"
                                        class="form-control" id="tanggal_lahir" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Daerah Asal</label>
                                    <input type="text" name="alamat" value="<?= set_value('alamat'); ?>"
                                        class="form-control" id="alamat" placeholder="Masukkan alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="negara_penempatan">Negara Penempatan</label>
                                    <input type="text" name="negara_penempatan"
                                        value="<?= set_value('negara_penempatan'); ?>" class="form-control"
                                        id="negara_penempatan" placeholder="Masukkan negara_penempatan">
                                    <?= form_error('negara_penempatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_datang">Tanggal Datang</label>
                                    <input type="date" name="tgl_datang" value="<?= set_value('tgl_datang'); ?>"
                                        class="form-control" id="tgl_datang" placeholder="Masukkan tgl_datang">
                                    <?= form_error('tgl_datang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pulang">jenis Pulang</label></br>
                                    <input type="text" name="jenis_pulang" value="<?= set_value('jenis_pulang'); ?>"
                                        class="form-control" id="jenis_pulang" placeholder="Masukkan jenis_pulang">
                                    <?= form_error('jenis_pulang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" value="<?= set_value('provinsi'); ?>"
                                        class="form-control" id="provinsi" placeholder="Masukkan provinsi">
                                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="debarkas">debarkasi</label>
                                    <input type="text" name="debarkas" value="<?= set_value('debarkas'); ?>"
                                        class="form-control" id="debarkas" placeholder="Masukkan debarkas">
                                    <?= form_error('debarkas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= set_value('ket'); ?>"
                                        class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="<?= base_url('pmi') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">Tambah Data
                                    PMI</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div> --