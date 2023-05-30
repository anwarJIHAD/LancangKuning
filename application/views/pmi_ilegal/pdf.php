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

        td {
            margin: 0px opx 0px 0px;
        }
    </style>
</head>

<body>
    <h1 style='text-align: center;' class="text-center bg-info">Laporan Pencegahan CPMI Ilegal</h1>
    <hr><br />
    <!-- <img src="<?= base_url('assets/') ?>img/bp2mi.png"> -->
    <table class="table table-striped table-hover" border="1" class="center">
        <thead>
            <tr align="center">
                <td colspan="6">Pelaksana</td>
                <td colspan="4">Korban</td>
                <td colspan="2">Pelaku</td>
                <td colspan="1">Informasi tambahan</td>

            </tr>
            <tr style='background-color:#B0E0E6;'>
                <th width="2%">NO</th>
                <th width="8%">Pelaksana</th>
                <th width="5%">Tanggal Pelaksana</th>
                <th width="10%">TKP</th>
                <th width="2%">Lokasi Shelter</th>
                <th width="2%">Penindak Lanjut</th>
                <th width="6%">Nama</th>
                <th width="6%">No Paspor</th>
                <th width="6%">No KTP</th>
                <th width="6%">Negara Tujuan</th>
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
                    <td colspan="4">
                        <table width="100%" border="0.5">
                            <?php
                            $did = $us['id_pendukung'];
                            $sql = "SELECT pmi_pendukung.id_pendukung, pmi_ilegal.* from pmi_pendukung INNER JOIN pmi_ilegal on pmi_pendukung.id_pendukung = pmi_ilegal.id_pendukung WHERE pmi_pendukung.id_pendukung = '$did'";
                            $query = $this->db->query($sql);
                            // var_dump($query);
                            // die;
                            if ($query->num_rows() > 0) {
                                $no = 0;
                                foreach ($query->result() as $row2) { ?>

                                    <tr style="padding:100px;">
                                        <td width="25%">
                                            <?php echo $row2->nama; ?>
                                        </td>
                                        <td width="25%">
                                            <?php echo $row2->no_paspor; ?>
                                        </td>
                                        <td width="25%">
                                            <?php echo $row2->no_ktp; ?>
                                        </td>
                                        <td width="25%">
                                            <?php echo $row2->negara_tujuan; ?>
                                        </td>
                                    </tr>

                                <?php }
                            } ?>
                        </table>
                    </td>
                    <td colspan="2">
                        <table width="100%" border="0.5">
                            <?php
                            $did = $us['id_pendukung'];
                            $sql = "SELECT pelaku.* from pmi_pendukung INNER JOIN pelaku on pmi_pendukung.id_pendukung = pelaku.id_pendukung WHERE pmi_pendukung.id_pendukung = '$did'";
                            $query = $this->db->query($sql);
                            // var_dump($query);
                            // die;
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $row2) { ?>

                                    <tr style="padding:100px;">
                                        <td width="25%">
                                            <?php echo $row2->nama_pelaku; ?>(
                                            <?php echo $row2->peran; ?> )
                                        </td>
                                        <td width="25%">
                                            <?php echo $row2->asal_daerah; ?>
                                        </td>

                                    </tr>

                                <?php }
                            } ?>
                        </table>
                    </td>

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