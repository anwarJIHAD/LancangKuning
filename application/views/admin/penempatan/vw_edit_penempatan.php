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
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= $penempatan['nama'] ?>"
                                        class="form-control" id="nama" placeholder="Masukkan Nama">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">jenis kelamin</label></br>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                        selected="<?= $penempatan['jenis_kelamin'] ?>">
                                        <option value="">--------------pilih jenis kelamin------------</option>
                                        <option value="laki-laki" <?php if ($penempatan['jenis_kelamin'] == "laki-laki")
                                            echo 'selected = "selected"'; ?>>
                                            laki-laki
                                        </option>

                                        <option value="perempuan" <?php if ($penempatan['jenis_kelamin'] == "perempuan")
                                            echo 'selected = "selected"'; ?>>
                                            Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" name="pendidikan" value="<?= $penempatan['pendidikan'] ?>"
                                        class="form-control" id="pendidikan" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" name="nik" value="<?= $penempatan['nik'] ?>"
                                        class="form-control" id="nik" placeholder="Masukkan nik">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_paspor">no_paspor</label>
                                    <input type="text" name="no_paspor" value="<?= $penempatan['no_paspor'] ?>"
                                        class="form-control" id="no_paspor" placeholder="Masukkan no_paspor">
                                    <?= form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="skema">Skema/B3MI</label>
                                    <input type="text" name="skema" value="<?= $penempatan['skema'] ?>"
                                        class="form-control" id="skema" placeholder="Masukkan skema">
                                    <?= form_error('skema', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="sektor_usaha">Sektor Usaha</label></br>
                                    <input type="text" name="sektor_usaha" value="<?= $penempatan['sektor_usaha'] ?>"
                                        class="form-control" id="sektor_usaha" placeholder="Masukkan sektor_usaha">
                                    <?= form_error('sektor_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_asal">Alamat Asal</label>
                                    <input type="text" name="alamat_asal" value="<?= $penempatan['alamat_asal'] ?>"
                                        class="form-control" id="alamat_asal" placeholder="Masukkan alamat_asal">
                                    <?= form_error('alamat_asal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">kabupaten</label>
                                    <input type="text" name="kabupaten" value="<?= $penempatan['kabupaten'] ?>"
                                        class="form-control" id="kabupaten" placeholder="Masukkan kabupaten">
                                    <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="negara_tujuan">Negara_Tujuan</label>
                                    <input type="text" name="negara_tujuan" value="<?= $penempatan['negara_tujuan'] ?>"
                                        class="form-control" id="negara_tujuan" placeholder="Masukkan negara_tujuan">
                                    <?= form_error('negara_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">jabatan</label>
                                    <input type="text" name="jabatan" value="<?= $penempatan['jabatan'] ?>"
                                        class="form-control" id="jabatan" placeholder="Masukkan jabatan">
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="company">company</label>
                                    <input type="text" name="company" value="<?= $penempatan['company'] ?>"
                                        class="form-control" id="company" placeholder="Masukkan company">
                                    <?= form_error('company', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">no_hp</label>
                                    <input type="number" name="no_hp" value="<?= $penempatan['no_hp'] ?>"
                                        class="form-control" id="no_hp" placeholder="Masukkan no_hp">
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="proses">proses</label>
                                    <input type="text" name="proses" value="<?= $penempatan['proses'] ?>"
                                        class="form-control" id="proses" placeholder="Masukkan proses">
                                    <?= form_error('proses', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="<?= base_url('Pmi_penempatan') ?>"
                                    class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">Edit
                                    penempatan PMI</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div> --