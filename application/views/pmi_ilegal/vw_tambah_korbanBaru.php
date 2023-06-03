<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php echo $judul ?>
                    </h1>
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
                            Tambah Korban Baru
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="pelaksana">
                                    <!-- Post -->
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pendukung"
                                            value="<?= $pendukung['id_pendukung']; ?>">

                                        <input type="hidden" name="no_korban" value="<?= $pelaksana['no_korban']; ?>" />

                                        <div class='tambah_form'>
                                            <div class="row" style="margin-top:20px; ">
                                                <div class="form-group row"
                                                    style="background-color:#C4FAF8; padding:10px; width: 90%; border-radius: 15px;">

                                                    <label for="inputName" class="col-sm-2 col-form-label"
                                                        style="margin-right:-70px;">Nama Korban:</label>
                                                    <div class="col-sm-2">

                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama_korban[]" placeholder="Name" multiple="multiple">
                                                        <?= form_error('nama_korban[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>

                                                    <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                        style="margin-right:-70px;">Daerah Asal:</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="daerah_asal_pmi"
                                                            name="daerah_asal_pmi[]" placeholder="daerah_asal_pmi"
                                                            multiple="multiple">
                                                        <?= form_error('daerah_asal_pmi[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                        style="margin-right:-70px;">Negara Tujuan:</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="negara_tujuan"
                                                            name="negara_tujuan[]" placeholder="negara_tujuan">
                                                        <?= form_error('negara_tujuan[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <!-- <li onclick='test()'
                                                    style="height:30px; margin-top:20px; color:blue; width: 10%;">
                                                    <i class="icon-plus-sign-alt">
                                                        tambah baris</i>
                                                </li> -->

                                                <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary"
                                                    style='margin-left:935px;'>Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->


                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card -->
                            <!-- <div class="a">
                            <div>asads</div>
                        </div>
                        <button onclick='test()'>asdasa</button> -->


                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".theSelect").select2();
</script>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
    }
</style>