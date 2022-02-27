<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold">Data Barang</h4><br>
                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <div class="col-md-4 grid-margin">
                    <a href="<?php echo base_url() ?>barang/tambah" class="btn btn-success btn-sm"><i class="ti ti-plus"></i> Tambah Barang</a></div>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                <div class="table-responsive pt-3 ">
                                <!-- </?php echo $this->session->flashdata('message'); ?> -->
                                <table id="datatable" class="table table-striped table-bordered table-md" cellspacing="0" height='50%'>
                                    <thead  class="thead-light">
                                        <tr>
                                            <th width='5px'>No</th>
                                            <th style= "text-align: center;">Nama Barang</th>
                                            <th style= "text-align: center;">Jenis Barang</th>
                                            <th style= "text-align: center;">Stok</th>
                                            <th style= "text-align: center;">Satuan Barang</th>
                                            <th style= "text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if ($barang) :
                                            foreach ($barang as $b) :
                                                ?>
                                                <tr>
                                                    <td style= "text-align: center;"><?php echo $no++ ?></td>
                                                    <td><?php echo $b['nama_barang'] ?></td>
                                                    <td><?php echo $b['nama_jenis'] ?></td>
                                                    <td><?php echo $b['stok'] ?></td>
                                                    <td><?php echo $b['nama_satuan'] ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success" href="<?php echo base_url('/barang/edit/' . $b['id_barang']) ?>"><i class="ti ti-pencil"></i></a>
                                                        <a id="hapusbarang" class="btn btn-sm btn-danger" href="<?php echo site_url('/barang/hapus/' . $b['id_barang']) ?>"><i class="ti ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Data Kosong
                                                </td>
                                            </tr>
                                        <?php endif; ?>
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