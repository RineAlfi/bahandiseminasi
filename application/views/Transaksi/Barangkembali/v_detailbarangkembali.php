<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text">Detail Barang Kembali</h3><br>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow p-5 md-12">
                            <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="text-center">
                                <img src="</?php echo base_url() ?>assets/file/Barangkembali/</?php echo $detaildata->foto ?>" alt="" class="img-thumbnail" style="height: 210px; width:200px">
                            </div><br>
                            <div class="col-lg-12 col-md-12 col-xs-9">
                            <table class="table table-no-bordered">
                                <tr>
                                    <th>Tanggal Keluar</th>
                                    <td><?php echo $detaildata->tanggal_keluar?></td>
                                </tr>
                                <tr>
                                    <th>Nama Barang</th>
                                    <td><?php echo $detailbarang->nama_barang?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <th>Tanggal Kembali</th>
                                    <td><?php echo $detaildata->tanggal_kembali?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Kembali</th>
                                    <td><?php echo $detaildata->jumlah_kembali?></td>
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
                                    <td><?php echo $detaildata->keterangan?></td>
                                </tr>
                            </table>
                            <a href="<?php echo base_url() ?>barangkembali" class="btn btn-warning float-right" >Kembali</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
            </div>
    </div>                   
</div>
</div>