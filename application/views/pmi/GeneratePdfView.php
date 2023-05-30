<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Create PDF from View in CodeIgniter Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1 style='text-align: center;'class="text-center bg-info">Laporan PMI Pekanbaru</h1>
<table class="table table-striped table-hover" border="1">
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
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
                                    <?php foreach ($surat_masuk as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['jenis_kelamin']; ?></td>
                                        <td><?= $us['tanggal_lahir']; ?> </td>
                                        <td><?= $us['alamat']; ?></td>
                                        <td><?= $us['negara_penempatan']; ?></td>
                                        <td><?= $us['tgl_datang']; ?></td>
                                        <td><?= $us['jenis_pulang']; ?></td>
                                        <td><?= $us['provinsi']; ?></td>
                                        <td><?= $us['debarkas']; ?></td>
                                        <td><?= $us['ket']; ?></td>

                                        
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
        <tbody>
</table>
</body>
</html>