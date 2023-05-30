<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $judul?></h1>
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

                <!-- /.card -->
                <!-- /.col -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active"
                                        href="<?= base_url('Pmi_ilegal/tambah_pendukung/') ?>" data-toggle="tab">Tambah
                                        Data
                                        Pelaksana</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?= base_url('Pmi_ilegal/tambah_pelaku1/') ?>">Tambah
                                        Pelaku</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?= base_url('Pmi_ilegal/tambah_korban/') ?>">Tambah
                                        Data
                                        Korban</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="pelaksana">
                                    <!-- Post -->
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama
                                                Pelaksana</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pelaksana" value="<?= set_value('nama_pelaksana'); ?>"
                                                    name="nama_pelaksana" placeholder="nama pelaksana">
                                                    <?= form_error('nama_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                           
                                        <!-- </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">Tanggal
                                                Pelaksanaan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_pelaksana"
                                                    name="tgl_pelaksana" placeholder="tanggal pelaksanaan">
                                            <?= form_error('tgl_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTKP" class="col-sm-2 col-form-label">TKP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="TKP" name="TKP"
                                                    placeholder="TKP">
                                            <?= form_error('TKP', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Lokasi
                                                Shelter</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="lokasi_shelter"
                                                    name="lokasi_shelter" placeholder="lokasi shelter">
                                            <?= form_error('lokasi_shelter', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" style="margin-left:1118px; margin-top:30px;" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pelaku">
                                    <!-- The timeline -->

                                    <!-- <form class="form-horizontal">
                                        <div class='tambah_form'>
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
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <button class='tambah_input btn btn-primary' id="tambah_input"
                                                            onclick="tambah_form()">tambah
                                                            baris</button>
                                                        <li class=""><a class="nav-link active"
                                                                onclick='tambah_form()'>Tambah
                                                                Pelaku</a>
                                                        </li>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form> -->
                                    <!-- /.card -->
                                    <!-- </div> -->
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
                            </div>
                            <!-- /.card -->
                            <!-- <div class="a">
                            <div>asads</div>
                        </div>
                        <button onclick='test()'>asdasa</button> -->

                            <script>
                                function test() {
                                    let temp_html = `<div class="form-group row">
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
                                            </div>`;
                                    $('.a').append(temp_html);
                                    $('.tambah_form').append(temp_html);
                                }
                            </script>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>