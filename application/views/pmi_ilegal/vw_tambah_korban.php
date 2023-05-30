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
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link"
                                        href="<?= base_url('Pmi_ilegal/tambah_pendukung/') ?>">Tambah
                                        Data
                                        Pelaksana</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?= base_url('Pmi_ilegal/tambah_pelaku1/') ?>">Tambah
                                        Pelaku</a>
                                </li>
                                <li class="nav-item"><a class="nav-link active"
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
                                        <input type="hidden" name="no_korban" value="KR<?= time() ?>" />

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama
                                                Pelaksana</label>
                                            <div class="col-sm-10">
                                                <select style="width:100%;" class="theSelect form-control"
                                                    name="pelaksana" id="pelaksana"
                                                    value="<?= set_value('pelaksana'); ?>">
                                                    <option value="">pilih nama Pelaksana</option>
                                                    <?php foreach ($pendukung as $p): ?>
                                                        <option value="<?= $p['id_pendukung']; ?>"><?= $p['nama_pelaksana']; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <?= form_error('pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Nama Pelaku</label>
                                            <div class="col-sm-10">
                                                <select style="width:100%;" class="theSelect" multiple="multiple"
                                                    name="pelaku[]" id="pelaku" value="<?= set_value('pelaku'); ?>">
                                                    <option value="">pilih pelaku</option>
                                                    <?php foreach ($pelaku as $p): ?>
                                                        <option value="<?= $p['id_pelaku']; ?>"><?= $p['nama_pelaku']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <?= form_error('pelaku[]', '<small class="text-danger pl-3">', '</small>'); ?>


                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Kronologi Pencegahan</label>
                                            <div class="col-sm-10">
                                                <textarea style="width:100%; height:80px"
                                                    placeholder="Kronologi Pencegahan" class="form-control"
                                                    id="kronologi" name="kronologi" value=""></textarea>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                instansi Penindak Lanjut</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="instansi" name="instansi"
                                                    placeholder="Instansi Penindak Lanjut" aria-label="penindaklanjut"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Tanggal Pelaksanaan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_pelaksanaan"
                                                    name="tgl_pelaksanaan" placeholder="tgl_pelaksanaan"
                                                    aria-label="penindaklanjut" aria-describedby="basic-addon1">
                                            </div>
                                            <?= form_error('tgl_pelaksanaan', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>

                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                TKP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="TKP" name="TKP"
                                                    placeholder="TKP" aria-label="penindaklanjut"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <?= form_error('TKP', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Lokasi Shelter</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="lokasi_shelter"
                                                    name="lokasi_shelter" placeholder="lokasi_shelter"
                                                    aria-label="penindaklanjut" aria-describedby="basic-addon1">
                                            </div>
                                            <?= form_error('lokasi_shelter', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>


                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-12 col-form-label text-center"
                                                style="color:blue;">
                                                Masukkan Data Korban!</label>
                                        </div>
                                        <hr>

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

                                                <li onclick='test()'
                                                    style="height:30px; margin-top:20px; color:blue; width: 10%;">
                                                    <i class="icon-plus-sign-alt">
                                                        tambah baris</i>
                                                </li>

                                                <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                                <script>
                                    function test() {
                                        let temp_html = `<div class="row" style="margin-top:20px; ">
                                        <div class="form-group row"
                                            style="background-color:#C4FAF8; padding:10px; width: 90%; border-radius: 15px;">

                                            <label for="inputName" class="col-sm-2 col-form-label"
                                                style="margin-right:-70px;">Nama Korban:</label>
                                            <div class="col-sm-2">

                                                <input type="text" class="form-control" id="nama" name="nama_korban[]"
                                                    placeholder="Name" multiple="multiple">
                                            </div>

                                            <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                style="margin-right:-70px;">Daerah Asal:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="daerah_asal_pmi"
                                                    name="daerah_asal_pmi[]" placeholder="daerah_asal_pmi"
                                                    multiple="multiple">
                                            </div>
                                            <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                style="margin-right:-70px;">Negara Tujuan:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="negara_tujuan"
                                                    name="negara_tujuan[]" placeholder="negara_tujuan">
                                            </div>
                                        </div>

                                        <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->
                                    </div>`;
                                        $('.tambah_form').append(temp_html);
                                    }
                                </script>
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