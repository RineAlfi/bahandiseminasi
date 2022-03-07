<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                text-align: center;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
    <table width="100%">
            <tr>
                <td><img src="<?= base_url('assets'); ?>/images/logo.png" width="90" height="90"></td>
                <td width="100%">
                    <center>
                        <font size="3">KEMENTERIAN PERTANIAN</font><br>
                        <font size="3">BADAN PENELITIAN DAN PENGEMBAGAN PERTANIAN</font><br>
                        <font size="4">BADAN PENELITIAN AGROKLIMAT DAN HIDROLOGI</font><br>
                        <font size="2">Jl. Tentara Pelajar No. 1A, Kampus Penelitian Pertanian Cimanggu Bogor 16111</font><br>
                        <font size="2">Telepon (0251) 8312760, Faksimili (0251) 8323909</font><br>
                        <font size="2">WEBSITE http://balitklimat.litbang.pertanian.go.id EMAIL: balitklimat@litbang.pertanian.go.id</font><br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
        </table>
        <div style="text-align:center">
            <h3> Laporan Transaksi Barang Keluar</h3>
            <h5> <?php echo $mulai;?> - <?php echo $akhir;?></h5>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th style= "text-align: center;">No.</th>
                    <th style= "text-align: center;">Tanggal Keluar</th>
                    <th style= "text-align: center;">Nama Barang</th>
                    <th style= "text-align: center;">Jumlah Keluar</th>
                    <th style= "text-align: center;">Keterangan</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $no = 1;
                if ($query)
                    foreach ($query as $bk) {
                    ?>
                    <tr>
                        <td style= "text-align: center;"><?php echo $no++; ?></td>
                        <td style= "text-align: left"><?php echo date('d-M-Y', strtotime($bk['tanggal_keluar'])) ?></td>
                        <td style= "text-align: left"><?php echo $bk['nama_barang']; ?></td>
                        <td style= "text-align: left"><?php echo $bk['jumlah_keluar'] . ' ' . $bk['nama_satuan']; ?></td>
                        <td style= "text-align: left"><?php echo $bk['keterangan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>