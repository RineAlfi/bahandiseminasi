<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf;?></title>
    <style>
        table tr .text2  {
            text-align: center;
        }

        #table tr td {
            font-size: 13px;
        }

        table tr .text{
            text-align: right;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <!-- <center> -->
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
        <table border="1" width="100%">
            <tr>
                <td class=text>Bogor, <?php echo date('d M Y');?></td>
            </tr>
        </table>
        <br>
        <br>
        <table border="1" width="100%">
            <tr>
                <td>
                    <center>
                        <font size="3">BERITA ACARA SERAH TERIMA</font><br>
                        <font size="3">BARANG DISEMINASI</font><br>
                    </center>
                </td>
            </tr>
        </table>
        <br>
        <table border="1" width="100%">
            <tr>
                <td width="100">Telah diterima dari: </td>
                <td>Balai Penelitian Agroklimat dan Hidrologi</td>
            </tr>
        </table>
        <table border="1" width="100%">
            <tr>
                <td width="100">Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td>
            </tr>
        </table>
        <table border="1" width="100%">
            <tr>
                <td width="100">Bahan Diseminasi&nbsp;: </td>
            </tr>
        </table>
        <!-- <table border="1" width="100%">
            </?php foreach ($barangkeluar as $dt): ?>
            <tr>
                <td width="100"></?php echo $dt->nama_barang?></td>
            </tr>
        </table> -->
        <table border="1" width="100%">
            <tr>
                <td width="100">Diserahkan pada&nbsp;&nbsp;&nbsp;: </td>
            </tr>
        </table>
        <br>
        <br>
        <!-- <table border="1" width="100%">
            <tr>
                <td width="100">Diserahkan pada&nbsp;: </td>
            </tr>
        </table>
        <br>
        <br>
        <br> -->
        <table border="1" width="100%">
            <tr>
                <td width="25"class="text2">Pemberi<br><br><br><br><hr> </td>
                <td width="50"></td>
                <td width="25" class="text2">Penerima<br><br><br><br><hr> </td>
            </tr>
        </table>

    <!-- </center> -->
</body>
</html>