<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Penanganan PMI Ilegal</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <a href="<?= base_url('Pmi_ilegal/tambah_pendukung/') ?>"
                                class="btn btn-secondary float-left">TAMBAHKAN
                                DATA</a>
                            <div class="btn-group" id='pdf'>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='fa fa-download'></i>
                                    Export
                                </button>
                                <ul class="dropdown-menu" id='dropdowns'>
                                    <li><a class="dropdown-item bg-warning" style='text-align: center; margin:auto;'
                                            id='dropdown' href="<?= base_url('Pmi_ilegal/pdf/') ?>"><i
                                                class='fa fa-download'></i>PDF</a>
                                    </li>
                                    <li><a class="dropdown-item bg-success align-text-center" id='dropdown'
                                            style='margin:5px auto 5px auto ; text-align: center; '
                                            href="<?= base_url('Pmi_ilegal/export/') ?>"><i
                                                class='fa fa-download'></i>EXCEL</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin: 0px 50px 0px 10px;  height:100px;">
                                <div class="col-sm-4">
                                    <p data-v-65be34a6="" class="text-capitalize mb-0 dark--text">
                                        Search Here
                                    </p>
                                    <div class="input-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="keyword" id="search_ilegal"
                                                placeholder=" Type here">

                                        </div>
                                        <div class="v-input__append-inner"><svg data-v-6fc48927=""
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" width="24" height="24px"
                                                class="darkbluelighter--text">
                                                <path data-v-6fc48927="" fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p data-v-65be34a6="" class="text-capitalize mb-0 dark--text">
                                        Filter Pelaksana
                                    </p>
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" name="provinsi"
                                            placeholder=" Type here"> -->
                                        <select style="width:100%;" id="Psearch" name="keyword" class="form-control"
                                            value="<?= set_value('pelaksana'); ?>">
                                            <option value="">pilih provinsi</option>
                                            <?php foreach ($pelaksana as $p): ?>
                                                <option value="<?= $p['pelaksana']; ?>"><?= $p['pelaksana']; ?>
                                                </option>
                                            <?php endforeach; ?>>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead style="text-align:center;">
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Nama Pelaksana</th>
                                        <th>TKP</th>
                                        <th>Lokasi Shelter</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="posTable">
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelaksana as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>
                                            </td>
                                            <td>
                                                <?= $us['tgl_pelaksanaan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['nama_pelaksana']; ?>
                                            </td>

                                            <td>
                                                <?= $us['TKP']; ?>
                                            </td>
                                            <td>
                                                <?= $us['lokasi_shelter']; ?>
                                            </td>




                                            <td>


                                                <a href="<?= base_url('Pmi_ilegal/tampil_pelaku/') . $us['no_korban']; ?>"
                                                    class="badge badge-info" style="margin-top:8px"
                                                    data-bs-target="#pelaku">Detail</a><br>
                                                <a href="<?= base_url('Pmi_ilegal/hapusSemua/') . $us['no_korban']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Pmi_ilegal/edit/') . $us['no_korban']; ?>"
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
                </div>
            </div>
        </div>
        <!-- modal pendukung -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header btn-primary">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Detail Data Pendukung</h1>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <td>
                                <label for="nama_pelaku" class="col-form-label">Nama Pelaksana</label>
                            </td>
                            <td>
                                <label for="data-p" class="col-form-label"> :</label>
                            </td>
                            <td>
                                <label for="data-p" class="col-form-label">
                                    <?= $us['pelaksana'] ?>
                                </label>
                            </td>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pelaku" class="col-form-label">Tanggal Pelaksana :
                                <?= $us['tgl_pelaksana'] ?>
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pelaku" class="col-form-label">TKP :
                                <?= $us['TKP'] ?>
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pelaku" class="col-form-label">Lokasi Shelter :
                                <?= $us['lokasi_shelter'] ?>
                            </label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal pelaku -->
        <div class="modal fade" id="pelaku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header btn-primary">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Detail Data Pelaku</h1>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($data as $us): ?>

                            <div class="mb-3">
                                <td>
                                    <label for="nama_pelaku" class="col-form-label">Nama Pelaku</label>
                                </td>
                                <td>
                                    <label for="data-p" class="col-form-label"> :</label>
                                </td>
                                <td>
                                    <label for="data-p" class="col-form-label">
                                        <?= $us['nama_pelaku'] ?>
                                    </label>
                                </td>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pelaku" class="col-form-label">Peran :
                                    <?= $us['peran'] ?>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="asal_daerah" class="col-form-label">Asal Daerah :
                                    <?= $us['asal_daerah'] ?>
                                </label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#search_ilegal").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            console.log(value)
            $("#posTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('#Psearch').change(function () {
            var value = $(this).val().toLowerCase();
            console.log(value)
            $("#posTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        })
    });
</script>