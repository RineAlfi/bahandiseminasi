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
    <table border="1" width="100%">
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
            <h3> Laporan Transaksi</h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($query)
                        foreach ($query as $bm) {
                        ?>
                        <tr>
                            <td style= "text-align: center;"><?php echo $no++; ?></td>
                            <td><?php echo $bm['tanggal_masuk']; ?></td>
                            <td><?php echo $bm['nama_barang']; ?></td>
                            <td><?php echo $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
                            <td><?php echo $bm['keterangan']; ?></td>
                        </tr>
                    <?php } ?>
                <tr>
                    <td scope="row">2</td>
                    <td>Kopi Hitam</td>
                    <td>Rp5.000,-</td>
                    <td>1</td>
                    <td>25 Oktober 2020, 16:01:03</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Gorengan Bakwan</td>
                    <td>Rp3.000,-</td>
                    <td>3</td>
                    <td>25 Oktober 2020, 15:01:02</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Nasi uduk</td>
                    <td>Rp14.000,-</td>
                    <td>2</td>
                    <td>25 Oktober 2020, 14:04:03</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>