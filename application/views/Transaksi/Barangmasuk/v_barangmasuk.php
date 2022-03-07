<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold">Data Barang Masuk</h3><br>
                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <div class="col-md-4 grid-margin mb-3">
                    <a href="<?php echo base_url() ?>barangmasuk/tambah" class="btn btn-success btn-sm"><i class="ti ti-plus"></i> Tambah Barang Masuk</a></div>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card mb-3">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="table-responsive pt-3"> -->
                                <table id="dataTable" class="table table-striped table-bordered table-md" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                        <th style="width:2%">No</th>
                                        <th style="width:2%">Tanggal Masuk</th>
                                        <th style= "text-align: center;">Nama Barang</th>
                                        <th style="width:5%">Jumlah Masuk</th>
                                        <!-- <th style= "text-align: center;">Keterangan</th> -->
                                        <!-- <th style= "text-align: center;">Dokumen</th> -->
                                        <th style= "text-align: center; width:5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        if ($barangmasuk)
                                            foreach ($barangmasuk as $bm) {
                                            ?>
                                            <tr>
                                                <td style= "text-align: center;"><?php echo $no++; ?></td>
                                                <td><?php echo $bm['tanggal_masuk']; ?></td>
                                                <td><?php echo $bm['nama_barang']; ?></td>
                                                <td><?php echo $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
                                                <!-- <td></?php echo $bm['keterangan']; ?></td> -->
                                                <!-- <td><a class="btn btn-sm btn-outline-primary btn-icon-text" href="</?php echo base_url() ?>assets/file/barangmasuk/</?php echo $bm['dokumen'] ?>"><i class="ti ti-download"></i> Unduh</a></td> -->

                                            <td>
                                                <a class="btn btn-sm btn-warning" href="<?php echo base_url('/barangmasuk/detail/' . $bm['id_barangmasuk']) ?>"><i class="ti ti-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url('/barangmasuk/edit/' . $bm['id_barangmasuk']) ?>"><i class="ti ti-pencil"></i></a>
                                                <a id="hapusmasuk" class="btn btn-sm btn-danger" href="<?php echo site_url('/barangmasuk/hapus/' . $bm['id_barangmasuk']) ?>"><i class="ti ti-trash"></i></a>
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