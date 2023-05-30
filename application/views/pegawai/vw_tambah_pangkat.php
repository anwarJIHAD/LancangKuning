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
                            <h3 class="card-title">Berkas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="NIP" value="<?= $user['NIP']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= set_value('keterangan'); ?>"
                                        class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">file</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file">
                                        <label for="file" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                                <a href="<?= base_url('pegawai') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">Tambah
                                    Data</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>