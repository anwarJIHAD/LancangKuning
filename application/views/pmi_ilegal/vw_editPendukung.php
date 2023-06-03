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

                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data Pendukung</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?= $this->session->flashdata('message'); ?>

                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="card-body">
                                        <input type="hidden" name="id_pendukung"
                                            value="<?= $pendukung['id_pendukung']; ?>">
                                        <div class="form-group row">


                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Nama Pelaksana</label>

                                            <div class="col-sm-10" sty>
                                                <select class="theSelect form-control" name="nama_pelaksana"
                                                    id="nama_pelaksana" value="<?= set_value('nama_pelaksana'); ?>">
                                                    <option value="">pilih nama Pelaksana</option>
                                                    <?php foreach ($pendukung1 as $p): ?>
                                                        <option value="<?= $p['id_pendukung']; ?>" selected=<?php echo $pendukung['nama_pelaksana'] ?>><?= $p['nama_pelaksana']; ?>

                                                        </option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="no_korban" value="KR<?= time() ?>" />
                                        <input type="hidden" name="no_korban1" value="<?= $no_korban ?>" />

                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Nama Pelaku</label>
                                            <div class="col-sm-9">
                                                <select style="width:100%;" class="theSelect" multiple="multiple"
                                                    id='#animal-select' name="pelaku[]" id="pelaku"
                                                    value="<?= set_value('pelaku'); ?>">
                                                    <option value="">pilih pelaku</option>
                                                    <?php foreach ($pelaku as $p): ?>
                                                        <option value="<?= $p['id_pelaku']; ?>" selected=><?= $p['nama_pelaku']; ?>

                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-1">

                                                <a href="<?= base_url('Pmi_ilegal/tambahpelaku_baru/') . $no_korban ?>"
                                                    class="badge badge-success"><i class="fa fa-plus"></i></a>


                                            </div>
                                            <!-- <?= form_error('pelaku[]', '<small class="text-danger pl-3">', '</small>'); ?> -->


                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Kronologi Pencegahan</label>
                                            <div class="col-sm-10">
                                                <textarea style="width:100%; height:80px"
                                                    placeholder="Kronologi Pencegahan" class="form-control"
                                                    id="kronologi" name="kronologi"
                                                    value="<?= $pelaksana['kronologi_Pencegahan']; ?>"><?= $pelaksana['kronologi_Pencegahan']; ?></textarea>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                instansi Penindak Lanjut</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="instansi" name="instansi"
                                                    value="<?= $pelaksana['instansi_penindaklanjut']; ?>"
                                                    placeholder="Instansi Penindak Lanjut" aria-label="penindaklanjut"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Tanggal Pelaksanaan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_pelaksanaan"
                                                    value="<?= $pelaksana['tgl_pelaksanaan']; ?>" name="tgl_pelaksanaan"
                                                    placeholder="tgl_pelaksanaan" aria-label="penindaklanjut"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <?= form_error('tgl_pelaksanaan', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>

                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                TKP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="TKP" name="TKP"
                                                    value="<?= $pelaksana['TKP']; ?>" placeholder="TKP"
                                                    aria-label="penindaklanjut" aria-describedby="basic-addon1">
                                            </div>
                                            <!-- <?= form_error('TKP', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Lokasi Shelter</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="lokasi_shelter"
                                                    value="<?= $pelaksana['lokasi_shelter']; ?>" name="lokasi_shelter"
                                                    placeholder="lokasi_shelter" aria-label="penindaklanjut"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <!-- <?= form_error('lokasi_shelter', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                        </div>


                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-12 col-form-label text-center"
                                                style="color:blue;">
                                                Edit Data Korban!</label>
                                        </div>
                                        <hr>
                                        <div class='tambah_form'>
                                            <?php foreach ($korban as $p): ?>
                                                <div class="row" style="margin-top:20px; ">
                                                    <div class="form-group row"
                                                        style="background-color:#C4FAF8; padding:10px; width: 90%; border-radius: 15px;">

                                                        <label for="inputName" class="col-sm-2 col-form-label"
                                                            style="margin-right:-70px;">Nama Korban:</label>
                                                        <div class="col-sm-2">

                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama_korban[]" placeholder="Name" multiple="multiple"
                                                                value="<?= $p['nama']; ?>">
                                                            <!-- <?= form_error('nama_korban[]', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                                        </div>

                                                        <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                            style="margin-right:-70px;">Daerah Asal:</label>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" id="daerah_asal_pmi"
                                                                name="daerah_asal_pmi[]" placeholder="daerah_asal_pmi"
                                                                value="<?= $p['daerah_asal_pmi']; ?>" multiple="multiple">
                                                            <!-- <?= form_error('daerah_asal_pmi[]', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                                        </div>
                                                        <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                            style="margin-right:-70px;">Negara Tujuan:</label>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" id="negara_tujuan"
                                                                value="<?= $p['negara_tujuan']; ?>" name="negara_tujuan[]"
                                                                placeholder="negara_tujuan">
                                                            <!-- <?= form_error('negara_tujuan[]', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                                        </div>
                                                    </div>

                                                    <!-- <li onclick='test()'
                                                        style="height:30px; margin-top:20px; color:blue; width: 10%;">
                                                        <i class="icon-plus-sign-alt">
                                                            tambah baris</i>
                                                    </li> -->

                                                    <!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->
                                                </div>

                                            <?php endforeach; ?>
                                            <div class="row">
                                                <label for="inputdaerah" class="col-sm-2 col-form-label"
                                                    style="margin-right:-70px;">Tambah Data Korban:</label>
                                                <div class="col-sm-2" style="margin:5px;">
                                                    <a href="<?= base_url('Pmi_ilegal/tambahKorban_baru/') . $no_korban ?>"
                                                        class="badge badge-success"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
                                        <a href="<?= base_url('Pmi_ilegal') ?>" class="btn btn-warning">Batal</a>
                                    </div>
                                </form>
                            </div>

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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".theSelect").select2();

    $(document).ready(function () {
        $('#animal-select')
            .attr('disabled', false);
    })

</script>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
    }
</style>