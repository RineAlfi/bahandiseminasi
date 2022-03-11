<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold">Data Barang kembali</h3><br>
                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <div class="flash-data" id="flash" data-flash="<?= $this->session->flashdata('error'); ?>"></div>
                    <!-- <div class="col-md-4 grid-margin">-->
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                <div class="table-responsive pt-3 ">
                                <?php echo $this->session->flashdata('message'); ?>
                                <table id="dataTable" class="table table-striped table-bordered table-md" style="width:100%">
                                    <thead  class="thead-light">
                                        <tr>
                                        <th width='5px'>No</th>
                                        <th width='20px' style= "text-align: center;">Tanggal Keluar</th> 
                                        <th style= "text-align: center;">ID Barang Keluar</th> 
                                        <th style= "text-align: center;">Jumlah Kembali</th> 
                                        <th style= "text-align: center;">Tanggal Kembali</th> 
                                        <!-- <th style= "text-align: center;">Keterangan</th>  -->
                                        <!-- <th style= "text-align: center;">File</th>  -->
                                        <th style= "text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        if ($keluarkembali)
                                            foreach ($keluarkembali as $kk) {
                                            ?>
                                            <tr>
                                                <td style= "text-align: center;"><?php echo $no++; ?></td>
                                                <td><?php echo $kk->tanggal_keluar ?></td>
                                                <td><?php echo $kk->id_barangkeluar ?></td>
                                                <td><?php echo $kk->jumlah_kembali ?></td>
                                                <td><?php echo $kk->tanggal_kembali; ?></td>
                                                <!-- <td></?php echo $kk->keterangan; ?></td> -->
                                                <!-- <td><a class="btn btn-sm btn-outline-primary btn-icon-text" href="</?php echo base_url() ?>assets/file/barangkembali/</?php echo $kk->dokumenkembali ?>"><i class="ti ti-download"></i> Unduh</a></td> -->

                                             <td>
                                                <a class="btn btn-sm btn-warning" href="<?php echo base_url('/barangkembali/detail/' . $kk->id_barangkembali) ?>"><i class="ti ti-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url('/barangkembali/edit/' . $kk->id_barangkembali) ?>"><i class="ti ti-pencil"></i></a>
                                                <a id="hapuskembali" class="btn btn-sm btn-danger" href="<?php echo site_url('/barangkembali/hapus/' . $kk->id_barangkembali) ?>"><i class="ti ti-trash"></i></a>
                                            </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
    </div>                   
</div>
</div>