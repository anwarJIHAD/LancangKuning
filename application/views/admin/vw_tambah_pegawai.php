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
                            <h3 class="card-title">Tambah Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= set_value('nama'); ?>"
                                        class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="NIP">NIP</label>
                                    <input type="number" name="NIP" value="<?= set_value('NIP'); ?>"
                                        class="form-control" id="NIP" placeholder="Masukkan NIP">
                                    <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status_pegawai">Status Pegawai</label>
                                    <select name="status_pegawai" id="status_pegawai" class="form-control"
                                        placeholder="Jenis Jabatan">
                                        <option value="">-----pilih jenis jabatan-----</option>
                                        <option value="PNS">
                                            PNS/P3K
                                        </option>
                                        <option value="PPNPN">
                                            PPNPN
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="password" name="password1" value="<?= set_value('password1'); ?>"
                                        class="form-control" id="password1" placeholder="Masukkan Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Ulangi Password</label>
                                    <input type="password" name="password2" value="<?= set_value('password2'); ?>"
                                        class="form-control" id="password2" placeholder="Ulangi Password">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <a href="<?= base_url('admin') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">Tambah
                                    Data</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>