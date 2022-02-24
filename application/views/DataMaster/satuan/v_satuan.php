<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold">Data Satuan Barang</h3><br>
                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <div class="col-md-4 grid-margin">
                    <a href="<?php echo base_url() ?>satuan/tambah" class="btn btn-success btn-md"><i class="ti ti-plus"></i> Tambah Satuan Barang</a></div>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                <div class="table-responsive pt-3 ">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-md" cellspacing="0" height='50%'>
                                    <thead  class="thead-light">
                                        <tr>
                                        <th width='5px' style= "text-align: center;">No</th>
                                        <th style= "text-align: center;">Satuan Barang</th>
                                        <th style= "text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($satuan as $j) {
                                        ?>
                                        <tr>
                                            <td style= "text-align: center;"><?php echo $no++ ?></td>
                                            <td><?php echo $j->nama_satuan ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="<?php echo base_url('/satuan/edit/' . $j->id) ?>"><i class="ti ti-pencil"></i></a>
                                            <a onclick="return confirm('Yakin hapus data ini?')" id="hapussatuan" class="btn btn-sm btn-danger" href="<?php echo site_url('/satuan/hapus/' . $j->id) ?>"><i class="ti ti-trash"></i></a>
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