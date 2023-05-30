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
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="NIP" value="<?= $user['NIP']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputText">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama"
                                        placeholder="Nama Lengkap">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Status Pegawai</label>
                                    <input type="text" class="form-control" value="<?= $user['role']; ?>" name="role"
                                        placeholder="Status Pegawai" readonly>
                                    <!-- <select name="status_pegawai" id="status_pegawai" class="form-control"
                                        selected="<?= $user['status_pegawai']; ?>" placeholder="status_pegawai" aria-readonly="">
                                        <option value="">-----pilih Status Pegawai-----</option>
                                        <option value="pns"
                                            <?php if ($user['status_pegawai'] == "pns")
                                                echo 'selected = "selected"'; ?>>
                                            pns
                                        </option>
                                        <option value="p3k"
                                            <?php if ($user['status_pegawai'] == "p3k")
                                                echo 'selected = "selected"'; ?>>
                                            p3k</option>
                                        <option value="ppnpn"
                                            <?php if ($user['status_pegawai'] == "ppnpn")
                                                echo 'selected = "selected"'; ?>>
                                            ppnpn</option>
                                    </select> -->

                                    <?= form_error('status_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">pangkat/golongan</label>
                                    <input type="text" class="form-control" value="<?= $user['pangkat']; ?>"
                                        name="pangkat" placeholder="Pangkat">
                                    <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Jenis Jabatan</label><br>
                                    <select name="jenis_jabatan" id="jenis_jabatan" class="form-control"
                                        selected="<?= $user['jenis_jabatan']; ?>" placeholder="Jenis Jabatan">
                                        <option value="">-----pilih jenis jabatan-----</option>
                                        <option value="struktural" <?php if ($user['jenis_jabatan'] == "struktural")
                                            echo 'selected = "selected"'; ?>>
                                            struktural
                                        </option>
                                        <option value="pelaksana" <?php if ($user['jenis_jabatan'] == "pelaksana")
                                            echo 'selected = "selected"'; ?>>
                                            pelaksana</option>
                                        <option value="fungsional" <?php if ($user['jenis_jabatan'] == "fungsional")
                                            echo 'selected = "selected"'; ?>>
                                            fungsional</option>
                                    </select>
                                    <?= form_error('jenis_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Jabatan</label>
                                    <input type="text" class="form-control" value="<?= $user['jabatan']; ?>"
                                        name="jabatan" placeholder="Jabatan">
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="<?= $user['pendidikan_terakhir']; ?>"
                                        name="pendidikan_terakhir" placeholder="Pendidikan Terakhir">
                                    <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">email</label>
                                    <input type="text" class="form-control" value="<?= $user['email']; ?>" name="email"
                                        placeholder="email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">no_hp</label>
                                    <input type="text" class="form-control" value="<?= $user['no_hp']; ?>" name="no_hp"
                                        placeholder="no_hp">
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText">Masa Kerja</label>
                                    <input type="date" class="form-control" value="<?= $user['masa_kerja']; ?>"
                                        name="masa_kerja" placeholder="Masa Kerja">
                                    <?= form_error('masa_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputText">Terakhir KGB</label>
                                    <input type="date" class="form-control" value="<?= $user['tgl_akhir']; ?>"
                                        name="tgl_akhir" placeholder="Tanggal Terakhir Naik Pangkat">
                                    <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Profile</label>
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                        <label for="gambar" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>

                                <a href="<?= base_url('pegawai') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-secondary float-right">Edit
                                    Profile</button>

                        </form>
                    </div>

                </div>

            </div>
    </section>
</div>