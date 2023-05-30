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
                                        <input type="hidden" name="no_korban" value="<?= $no_korban ?>" />

                                        <!-- <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Nama Pelaku</label>
                                            <div class="col-sm-10">
                                                <select style="width:100%;" class="theSelect" multiple="multiple"
                                                    name="pelaku[]" id="pelaku" value="<?= set_value('pelaku'); ?>">
                                                    <option value="">pilih pelaku</option>
                                                    <?php foreach ($pelaku as $p): ?>
                                                        <option value="<?= $p['id_pelaku']; ?>" selected=><?= $p['nama_pelaku']; ?>

                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <?= form_error('pelaku[]', '<small class="text-danger pl-3">', '</small>'); ?>


                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputtgl" class="col-sm-2 col-form-label">
                                                Kronologi Pencegahan</label>
                                            <div class="col-sm-10">
                                                <textarea style="width:100%; height:80px"
                                                    placeholder="Kronologi Pencegahan" class="form-control"
                                                    id="kronologi" name="kronologi"  value="<?= $pelaksana['kronologi_Pencegahan'];?>"></textarea>
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



                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
                                    </div>
                                </form>
                            </div>
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
</script>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
    }
</style>