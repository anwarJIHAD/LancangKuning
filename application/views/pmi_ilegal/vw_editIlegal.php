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
                            <h3 class="card-title">Ubah Data Korban</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pelaksana">Pelaksana :
                                    <?= $pendukung['pelaksana']; ?>
                                </label><br>
                                <a href="<?= base_url('Pmi_ilegal/editP_tambahCPMI/').$pendukung['id_pendukung'];  ?>"
                                    class="btn btn-secondary float-left" style="margin-right:auto;">TAMBAHKAN
                                    DATA KORBAN</a>



                            </div>


                            <div class="form-group"><br><br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Korban</th>
                                            <th>Nama</th>
                                            <th>Nomor Paspor</th>
                                            <th>Nomor KTP</th>
                                            <th>Daerah Asal Perekrutan</th>
                                            <th>Negara Tujuan </th>
                                            <th>AKSI</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($korban as $us) : ?>
                                        <tr>
                                            <td><?= $us['no_korban']; ?></td>
                                            <td><?= $us['nama']; ?></td>
                                            <td><?= $us['no_paspor']; ?></td>
                                            <td><?= $us['no_ktp']; ?> </td>
                                            <td><?= $us['Daerah_asal_rekrut']; ?></td>
                                            <td><?= $us['negara_tujuan']; ?></td>
                                            <td>
                                                <a href="<?= base_url('Pmi_ilegal/hapusdetail/') . $us['no_korban'].'/'.$us['id_pendukung']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Pmi_ilegal/edit_detail/') . $us['no_korban'].'/'.$us['id_pendukung']; ?>"
                                                    class="badge badge-warning">Edit</a>
                                            </td>



                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('Pmi_ilegal')?>" class="btn btn-success">selesai</a>
                        </div>

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
                        <form action="<?= base_url('Pmi_ilegal/tambah_pelaku/') ?>" method="POST">
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