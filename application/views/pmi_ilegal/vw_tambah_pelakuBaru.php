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

                <!-- /.card -->
                <!-- /.col -->

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="pelaku">
                                    <!-- The timeline -->

                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class='tambah_form'>
                                            <div class="row" style="margin-top:20px; ">
                                                <div class="form-group row"
                                                    style="background-color:#C4FAF8; padding:15px; width: 80%; border-radius: 15px;">

                                                    <input type="hidden" name="id_pendukung"
                                                        value="<?= $pendukung['id_pendukung']; ?>">

                                                    <input type="hidden" name="no_korban"
                                                        value="<?= $pelaksana['no_korban']; ?>" />
                                                    <input type="hidden" name="kronologi"
                                                        value="<?= $pelaksana['kronologi_Pencegahan']; ?>" />


                                                    <input type="hidden" class="form-control" id="instansi"
                                                        name="instansi_penindaklanjut"
                                                        value="<?= $pelaksana['instansi_penindaklanjut']; ?>"
                                                        placeholder="Instansi Penindak Lanjut"
                                                        aria-label="penindaklanjut" aria-describedby="basic-addon1">

                                                    <input type="hidden" class="form-control" id="tgl_pelaksanaan"
                                                        value="<?= $pelaksana['tgl_pelaksanaan']; ?>"
                                                        name="tgl_pelaksanaan" placeholder="tgl_pelaksanaan"
                                                        aria-label="penindaklanjut" aria-describedby="basic-addon1">

                                                    <input type="hidden" name="TKP" value="<?= $pelaksana['TKP']; ?>" />
                                                    <input type="hidden" name="lokasi_shelter"
                                                        value="<?= $pelaksana['lokasi_shelter']; ?>" />


                                                    <label for="inputName" class="col-sm-1 col-form-label"
                                                        style="margin-left:100px;">Nama:</label>
                                                    <div class="col-sm-2" style="margin-right:150px;">
                                                        <input type="text" class="form-control" id="peran"
                                                            name="nama_pelaku[]" placeholder="Name" multiple="multiple">
                                                        <?= form_error('nama_pelaku[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>

                                                    <label for="inputEmail"
                                                        class="col-sm-1 col-form-label">Peran:</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="peran"
                                                            name="peran[]" placeholder="Peran" multiple="multiple">
                                                        <?= form_error('peran[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <!-- <li onclick='test()' style="height:30px; margin-top:20px; color:blue;">
                                                    <i class="icon-plus-sign-alt">
                                                        tambah baris</i>
                                                </li> -->

                                                <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->


                                            </div>


                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary"
                                                    style="margin-left:63%;">Tambah Pelaku</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.card -->
                                </div>

                            </div>

                            <script>
                                $(document).ready(function () {

                                    $(".tambah").css("cursor", "pointer");

                                })

                                function test() {
                                    let temp_html = `  <div class="row" style="margin-top:20px;">
                                                <div class="form-group row"
                                                    style="background-color:#C4FAF8; padding:15px; width: 80%;">

                                                    <label for="inputName" class="col-sm-1 col-form-label"
                                                        style="margin-left:100px;">Nama:</label>
                                                    <div class="col-sm-2" style="margin-right:150px;">
                                                        <input type="text" class="form-control" id="peran"
                                                            name="nama_pelaku[]" placeholder="Name" multiple="multiple">
                                                        <?= form_error('nama_pelaku[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>

                                                    <label for="inputEmail"
                                                        class="col-sm-1 col-form-label">Peran:</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="peran"
                                                            name="peran[]" placeholder="Peran" multiple="multiple">
                                                        <?= form_error('peran[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <li onclick='test()' style="height:30px; margin-top:20px;"><i
                                                        class="icon-plus-sign-alt">
                                                        tambah baris</i></li>

                                                <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->


                                            </div>`;
                                    $('.tambah_form').append(temp_html);
                                }
                            </script>
                            <!-- /.col -->
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