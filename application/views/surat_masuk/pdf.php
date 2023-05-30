<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Create PDF from View in CodeIgniter Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"
        rel="stylesheet" />
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <h1 style='text-align: center;' class="text-center bg-info">Laporan Surat Masuk BP3MI Pekanbaru</h1>
    <table class="table table-striped table-hover" border="1" class="center">
        <thead>
            <tr style='background-color:#B0E0E6;'>
                <th>NO</th>
                <th>Nomor Surat</th>
                <th>Tanggal Kirim</th>
                <th>Tanggal Terima</th>
                <th>Pengirim</th>
                <th>Perihal</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($surat_masuk as $us): ?>
                <tr>
                    <td>
                        <?= $i; ?>.
                    </td>
                    <td>
                        <?= $us['no_surat']; ?>
                    </td>
                    <td>
                        <?= $us['tgl_kirim']; ?>
                    </td>
                    <td>
                        <?= $us['tgl_terima']; ?>
                    </td>
                    <td>
                        <?= $us['pengirim']; ?>
                    </td>
                    <td>
                        <?= $us['perihal']; ?>
                    </td>
                    

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <tbody>
    </table>
</body>

</html>