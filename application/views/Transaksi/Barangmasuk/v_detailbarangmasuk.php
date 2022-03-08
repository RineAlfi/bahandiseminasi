<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text">Detail Barang Masuk</h3><br>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow p-5 md-12">
                            <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/file/barangmasuk/<?php echo $detail->foto ?>" alt="" class="img-thumbnail" style="height: 210px; width:200px">
                            </div><br>
                            <div class="col-lg-12 col-md-12 col-xs-9">
                            <table class="table table-no-bordered">
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td><?php echo $detail->tanggal_masuk?></td>
                                </tr>
                                <tr>
                                    <th>Nama Barang</th>
                                    <td><?php echo $detail->nama_barang?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Masuk</th>
                                    <td><?php echo $detail->jumlah_masuk?></td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td><?php echo $detailbarang->nama_satuan?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Barang</th>
                                    <td><?php echo $detailbarang->nama_jenis?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><?php echo $detail->keterangan?></td>
                                </tr>
                                <th>Dokumen</th>
                                    <td>
                                    <?php
                                        if ($dok)
                                            foreach ($dok as $detail) {
                                            ?>
                                            <a class="btn btn-outline-primary btn-icon-text btn-sm" href="<?= base_url() ?>assets/file/Barangmasuk/<?= $detail->nama_dokumen ?>" target="_blank">
                                                <i class="ti ti-download"></i> <?= $detail->nama_dokumen; ?>
                                            </a>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </table>
                            <a href="<?php echo base_url() ?>barangmasuk" class="btn btn-warning float-right" >Kembali</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
            </div>
    </div>                   
</div>
</div>