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
    <h1 style='text-align: center;' class="text-center bg-info">Laporan Surat Keluar BP3MI Pekanbaru</h1>
    <p style='text-align: center;'>
        ----------------------------------------------------------------------------------------------------------</p>
    <table class="table table-striped table-hover" border="1" class="center">
        <thead>
            <tr align="center">
                <td colspan="6">Pelaksana</td>
                <td colspan="4">Korban</td>
                <td colspan="3">Pelaku</td>
                <td colspan="1">Informasi tambahan</td>

            </tr>
            <tr style='background-color:#B0E0E6;'>
                <th>NO</th>
                <th>Pelaksana</th>
                <th>Tanggal Pelaksana</th>
                <th>TKP</th>
                <th>Lokasi Shelter</th>
                <th>Penindak Lanjut</th>
                <th>Nama</th>
                <th>No Paspor</th>
                <th>No KTP</th>
                <th>Negara Tujuan</th>
                <th width="8%">Pelaku (Peran)</th>
                <th width="8%">Asal Daerah</th>
                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $us): ?>
                <tr>
                    <td>
                        <?= $i; ?>.
                    </td>
                    <td>
                        <?= $us['pelaksana']; ?>
                    </td>

                    <td>
                        <?= $us['tgl_pelaksana']; ?>
                    </td>
                    <td>
                        <?= $us['TKP']; ?>
                    </td>
                    <td>
                        <?= $us['lokasi_shelter']; ?>
                    </td>
                    <td>
                        <?= $us['instansi_penindaklanjut']; ?>
                    </td>
                    <td>
                        <?= $us['nama']; ?>
                    </td>
                    <td>
                        <?= $us['no_paspor']; ?>
                    </td>
                    <td>
                        <?= $us['no_ktp']; ?>
                    </td>
                    <td>
                        <?= $us['negara_tujuan']; ?>
                    </td>
                    <td colspan=2>
                        <table width="100%">
                            <?php
                            $dat = $us['no_korban'];
                            $sql = "SELECT detail_ilegal.no_korban, pelaku.* from detail_ilegal  INNER JOIN pelaku on detail_ilegal.id_pelaku = pelaku.id_pelaku WHERE detail_ilegal.no_korban = '$dat'";
                            $query = $this->db->query($sql);
                            // var_dump($query);
                            // die;
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $row) { ?>

                                    <tr>
                                        <td width="50%">
                                            <b>Nama</b> :
                                            <?php echo $row->nama_pelaku; ?>,<br>
                                            <b>Peran</b> :
                                            <?php echo $row->peran; ?>,
                                        </td>
                                        <td width="50%">
                                            <?php echo $row->asal_daerah; ?>
                                        </td>
                                    </tr>

                                <?php }
                            } ?>
                        </table>
                    </td>
                    <!-- <td>
                        <?= $us['nama_pelaku']; ?>
                    </td>
                    <td>
                        <?= $us['peran']; ?>
                    </td>
                    <td>
                        <?= $us['asal_daerah']; ?>
                    </td> -->
                    <td>
                        <?= $us['keterangan']; ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <tbody>
    </table>
</body>

</html>