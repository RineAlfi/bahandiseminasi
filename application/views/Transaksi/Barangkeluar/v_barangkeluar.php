<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold">Riwayat Barang Keluar</h3><br>
                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <div class="col-md-4 grid-margin">
                    <a href="<?php echo base_url() ?>barangkeluar/tambah" class="btn btn-success btn-md"><i class="ti ti-plus"></i> Tambah Barang Keluar</a></div>
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                <div class="table-responsive pt-3 ">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-md" cellspacing="0" height='50%'>
                                    <thead  class="thead-light">
                                        <tr>
                                        <th width='5px'>No</th>
                                        <th width='20px' style= "text-align: center;">Tanggal Keluar</th>
                                        <th style= "text-align: center;">Nama Barang</th>
                                        <th style= "text-align: center;">Jumlah Keluar</th>
                                        <th style= "text-align: center;">Keterangan</th>
                                        <th style= "text-align: center;">Upload Berita Acara</th>
                                        <th style= "text-align: center;">File</th>
                                        <th style= "text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        if ($barangkeluar)
                                            foreach ($barangkeluar as $bk) {
                                            ?>
                                            <tr>
                                                <td style= "text-align: center;"><?php echo $no++; ?></td>
                                                <td><?php echo $bk['tanggal_keluar']; ?></td>
                                                <td><?php echo $bk['nama_barang']; ?></td>
                                                <td><?php echo $bk['jumlah_keluar'] . ' ' . $bk['nama_satuan']; ?></td>
                                                <td><?php echo $bk['keterangan']; ?></td>
                                                <td><?php echo $bk['status']; ?></td>
                                                <td><a class="btn btn-sm btn-outline-primary btn-icon-text" href="<?php echo base_url() ?>assets/file/barangkeluar/<?php echo $bk['dokumen'] ?>"><i class="ti ti-download"> Unduh</i></a></td>

                                            <td>
                                                <a class="btn btn-sm btn-warning" href="<?php echo base_url('/barangkeluar/detail/' . $bk['id_barangkeluar']) ?>"><i class="ti ti-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url('/barangkeluar/edit/' . $bk['id_barangkeluar']) ?>"><i class="ti ti-pencil"></i></a>
                                                <a onclick="return confirm('Yakin hapus data ini?')" id="hapuskeluar" class="btn btn-sm btn-danger" href="<?php echo site_url('/barangkeluar/hapus/' . $bk['id_barangkeluar']) ?>"><i class="ti ti-trash"></i></a>
                                                <a class="btn btn-sm btn-info" href="<?php echo base_url('/barangkembali/tambah/' . $bk['id_barangkeluar']) ?>"><i class="ti-back-left"></i></a>
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