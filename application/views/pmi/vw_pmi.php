<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Data PMI</h1>
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
                            <a href="<?= base_url('Pmi/tambah/') ?>" class="btn btn-secondary float-left">TAMBAHKAN
                                DATA</a>


                            <!-- Example single danger button -->
                            <div class="btn-group" id='pdf'>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='fa fa-download'></i>
                                    Export
                                </button>
                                <ul class="dropdown-menu" id='dropdowns'>
                                    <li><a class="dropdown-item bg-warning" style='text-align: center; margin:auto;'
                                            id='dropdown' href="<?= base_url('Pmi/pdf/') ?>"><i
                                                class='fa fa-download'></i>PDF</a>
                                    </li>
                                    <li><a class="dropdown-item bg-success align-text-center" id='dropdown'
                                            style='margin:5px auto 5px auto ; text-align: center; '
                                            href="<?= base_url('Pmi/export/') ?>"><i
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
                                            <input type="text" class="form-control" name="keyword" id="posSearch"
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
                                        Filter Provinsi
                                    </p>
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" name="provinsi"
                                            placeholder=" Type here"> -->
                                        <select style="width:100%;" id="Psearch" name="keyword" class="form-control"
                                            value="<?= set_value('provinsi'); ?>">
                                            <option value="">pilih provinsi</option>
                                            <?php foreach ($provinsi as $p): ?>
                                                <option value="<?= $p['provinsi']; ?>"><?= $p['provinsi']; ?>
                                                </option>
                                            <?php endforeach; ?>>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Daerah Asal</th>
                                        <th>Negara Penempatan</th>
                                        <th>Tanggal Datang </th>
                                        <th>Jenis Pulang</th>
                                        <th>Provinsi</th>
                                        <th>Debarkasi</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="resultMain">
                                    <?php $i = 1; ?>
                                    <?php foreach ($surat_masuk as $us): ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>.
                                            </td>
                                            <td>
                                                <?= $us['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $us['jenis_kelamin']; ?>
                                            </td>
                                            <td>
                                                <?= $us['tanggal_lahir']; ?>
                                            </td>
                                            <td>
                                                <?= $us['alamat']; ?>
                                            </td>
                                            <td>
                                                <?= $us['negara_penempatan']; ?>
                                            </td>
                                            <td>
                                                <?= $us['tgl_datang']; ?>
                                            </td>
                                            <td>
                                                <?= $us['jenis_pulang']; ?>
                                            </td>
                                            <td>
                                                <?= $us['provinsi']; ?>
                                            </td>
                                            <td>
                                                <?= $us['debarkas']; ?>
                                            </td>
                                            <td>
                                                <?= $us['ket']; ?>
                                            </td>

                                            <td>
                                                <a href=" <?= base_url('pmi/hapus/') . $us['id_pmi']; ?>"
                                                    class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('pmi/edit/') . $us['id_pmi']; ?>"
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
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script>
// $(document).ready(function() {
//     $("#posSearch").on("keyup", function() {
//         var value = $(this).val().toLowerCase();
//         console.log(value)
//         $("#posTable tr").filter(function() {
//             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//         });
//     });

//     $('#Psearch').change(function() {
//         var value = $(this).val().toLowerCase();
//         console.log(value)
//         $("#posTable tr").filter(function() {
//             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//         });
//     })
// });
</script>
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
<script>
    $(document).ready(function () {
        load_data();



        function load_data(query) {
            $.ajax({
                url: "<?= base_url(); ?>Pmi/fetch",
                method: "POST",
                data: {
                    query: query
                },
                success: function (data) {
                    $('#resultMain').html(data);
                }
            })
        }

        $('#posSearch').on("keyup", function () {
            $('#Psearch').val('');
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
        $("#Psearch").change(function (event) {
            $('#posSearch').val('');
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });

    });
</script>