<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <?= $this->session->flashdata('message'); ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?= base_url('assets/img/pegawai/') . $user['gambar']; ?>"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

                            <p class="text-muted text-center"><?= $user['jabatan']; ?></p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Pendidikan Terakhir</strong>

                            <p class="text-muted">
                                <?= $user['pendidikan_terakhir']; ?>
                            </p>

                            <hr>
                            <strong><i class="fas fa-chalkboard-teacher mr-1"></i> Jenis Jabatan</strong>

                            <p class="text-muted"><?= $user['jenis_jabatan']; ?></p>

                            <hr>
                            <strong><i class="fas fa-chalkboard-teacher mr-1"></i> Jabatan</strong>

                            <p class="text-muted"><?= $user['jabatan']; ?></p>

                            <hr>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">About
                                        Me</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Berkas</a>
                                </li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a> -->
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="card-body">
                                        <strong><i class="far fa-address-card mr-1"></i> NIP</strong>

                                        <p class="text-muted">
                                            <?= $user['NIP']; ?>
                                        </p>

                                        <hr>

                                        <strong><i class="far fa-address-book mr-1"></i> Status Pegawai</strong>

                                        <p class="text-muted"><?= $user['role']; ?></p>

                                        <hr>

                                        <strong><i class="fas fa-user-tie mr-1"></i> Pangkat/Golongan</strong>

                                        <p class="text-muted"><?= $user['pangkat']; ?></p>

                                        <hr>

                                        <strong><i class="far fa-building mr-1"></i> NO HP</strong>

                                        <p class="text-muted"><?= $user['no_hp']; ?></p>

                                        <hr>
                                        <strong><i class="far fa-building mr-1"></i>Email</strong>

                                        <p class="text-muted"><?= $user['email']; ?></p>

                                        <hr>

                                        <strong><i class="fas fa-bullhorn mr-1"></i> masa kerja</strong>
                                        <input type="hidden" id="bb" value="<?= $user['masa_kerja']; ?>">
                                        <div class="masa_kerja">

                                        </div>
                                        <p class="text-muted" hid></p>

                                        <hr>

                                        <strong><i class="far fa-calendar-alt mr-1"></i> Terakhir KGB</strong>

                                        <p class="text-muted"><?= $user['tgl_akhir']; ?></p>

                                        <hr>



                                        <a href="<?= base_url('pegawai/edit/') . $user['NIP']; ?>"
                                            class="btn btn-secondary float-right">EDIT PROFILE</a>


                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->

                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-header">
                                            <a href="<?= base_url('pangkat/tambah/') . $user['NIP']; ?>"
                                                class="btn btn-secondary float-left">TAMBAHKAN BERKAS</a>
                                        </div>
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Keterangan</th>
                                                        <th>file</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($pangkat as $us) : ?>
                                                    <tr>
                                                        <td> <?= $i; ?>.</td>
                                                        <td><?= $us['keterangan']; ?></td>
                                                        <td>
                                                            <a
                                                                href="<?php echo base_url().'assets/img/pegawai/'. $us['file']; ?>"><i
                                                                    class="fa fa-download" aria-hidden="true"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('Pangkat/hapus/') . $us['id']; ?>"
                                                                class="badge badge-danger">Hapus</a>
                                                            <a href="<?= base_url('Pangkat/edit/') . $us['id']; ?>"
                                                                class="badge badge-warning">Edit</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.tab-pane -->

                                <!-- <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience"
                                                class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                    placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                    placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>