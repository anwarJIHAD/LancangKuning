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
            <!-- form start -->
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data CPMI</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="no_korban" value="KR<?=time()?>" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pelaksana">Pelaksana :
                                        <?= $pendukung['pelaksana']; ?>
                                    </label>

                                </div>
                                <div class="row">
                                    <div class="col-md-6    ">
                                        <div class="form-group">
                                            <label for="negara_tujuan">Pelaku</label><br>
                                            <select style="width:100%;" class="theSelect" multiple="multiple"
                                                name="pelaku[]" id="pelaku" value="<?= set_value('pelaku'); ?>">
                                                <option value="">pilih pelaku</option>
                                                <?php foreach ($pelaku as $p): ?>
                                                <option value="<?= $p['id_pelaku']; ?>"><?= $p['nama_pelaku']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="negara_tujuan"></label><br>

                                            <button type="button" class="btn btn-success float-left"
                                                data-bs-toggle="modal" style="margin-top:8px"
                                                data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i
                                                    class="fa fa-plus"></i></button>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="hidden" name="id_pendukung" value="<?= $pendukung['id_pendukung']; ?>">
                                    <input type="text" name="nama" value="<?= set_value('nama'); ?>"
                                        class="form-control" id="nama" placeholder="Masukkan Pelaksana">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="no_paspor">Nomor Paspor</label>
                                    <input type="text" name="no_paspor" value="<?= set_value('no_paspor'); ?>"
                                        class="form-control" id="no_paspor" placeholder="Masukkan Tanggal Pelaksana">
                                    <?= form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="no_ktp">nomor KTP</label>
                                    <input type="number" name="no_ktp" value="<?= set_value('no_ktp'); ?>"
                                        class="form-control" id="no_ktp" placeholder="Masukkan Tanggal Pelaksana">
                                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="Daerah_asal_rekrut">Daerah Asal Rekrut</label>
                                    <input type="text" name="Daerah_asal_rekrut"
                                        value="<?= set_value('Daerah_asal_rekrut'); ?>" class="form-control"
                                        id="Daerah_asal_rekrut" placeholder="Masukkan Tanggal Pelaksana">
                                    <?= form_error('Daerah_asal_rekrut', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="negara_tujuan">Negara Tujuan</label>
                                    <input type="text" name="negara_tujuan" value="<?= set_value('negara_tujuan'); ?>"
                                        class="form-control" id="negara_tujuan"
                                        placeholder="Masukkan Tanggal Pelaksana">
                                    <?= form_error('negara_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md">
                                        <a href="<?= base_url('Pmi_ilegal/edit_cpmi/').$pendukung['id_pendukung'];?>"
                                            class="btn btn-danger">selesai</a>

                                    </div>
                                    <div class="col-md" style="margin-left:80%;">
                                        <button type="submit" class="btn btn-primary">simpan</button>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header btn-primary">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Tambah Pelaku</h1>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Pmi_ilegal/tambah_pelaku2/') ?>" method="POST">
                            <input type="hidden" name="id_pendukung" value="<?= $pendukung['id_pendukung']; ?>">
                            <div class="mb-3">
                                <label for="nama_pelaku" class="col-form-label">Nama Pelaku</label>
                                <input type="text" name="nama_pelaku" class="form-control" id="nama_pelaku">
                            </div>
                            <div class="mb-3">
                                <label for="peran" class="col-form-label">peran</label>
                                <textarea class="form-control" name="peran" id="peran"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="asal_daerah" class="col-form-label">Asal Daerah</label>
                                <textarea class="form-control" name="asal_daerah" id="asal_daerah"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




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