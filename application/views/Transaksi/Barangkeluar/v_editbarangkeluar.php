<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold">Edit Data Barang Keluar</h3><br>
                <div class="col-md-12 grid-margin">
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <?php echo form_open_multipart('barangkeluar/simpan', []);?>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $detail->id_barangkeluar; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Tanggal keluar</b></label>
                        <input type="date" name="tanggal_keluar" value="<?php echo set_value('tanggal_keluar', $barangkeluar['tanggal_keluar']); ?>" name="tanggal_keluar" type="text" class="form-control">
                        <?php echo form_error('tanggal_keluar', '<small class="text-danger">', '</small>')?>
                    </div>
                    <!-- <div class="form-group">
                        <label><b>Nama Barang</b></label>
                        <input value="<//?php echo set_value('barang', $barangkeluar['barang_id']); ?>" name="nama_barang" id="barang" type="text" class="form-control" required>
                        <//?php echo form_error('nama_barang', '<small class="text-danger">', '</small>')?>
                    </div> -->
                    <div class="form-group">
                        <label><b>Nama Barang</b></label>
                        <select name="barang_id" id="barang_id" class="form-control">
                            <option value="" selected disabled>--Pilih Nama Barang--</optiion>
                            <?php foreach($barang as $b) : ?>
                                <option <?php echo $barangkeluar['barang_id'] == $b['id_barang'] ? 'selected' : '';?> <?php echo set_select('barang_id', $b['id_barang']) ?> value="<?php echo $b['id_barang'] ?>"><?php echo $b['nama_barang'] ?></option> 
                            <?php endforeach; ?>
                        </select>
                    <?php echo form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label><b>Jumlah keluar</b></label>
                        <input type="number" name="jumlah_keluar" value="<?php echo set_value('jumlah_keluar', $barangkeluar['jumlah_keluar']); ?>" name="jumlah_keluar" class="form-control">
                        <?php echo form_error('jumlah_keluar', '<small class="text-danger">', '</small>')?>
                    </div>
                    <div class="form-group">
                        <label><b>Keterangan</b></label>
                        <input type="text" name="keterangan" value="<?php echo set_value('keterangan', $barangkeluar['keterangan']); ?>" name="keterangan" class="form-control">
                        <?php echo form_error('keterangan', '<small class="text-danger">', '</small>')?>
                    </div>
                    <div class="form-group">
                        <label><b>Foto Produk</b></label>
                        <input type="file" name="foto" value="<?php echo set_value('foto', $barangkeluar['foto']); ?>" name="foto" class="form-control">
                        <?php echo form_error('foto', '<small class="text-danger">', '</small>')?>
                    </div>
                    <div class="form-group">
                        <label><b>File</b></label>
                        <input type="file" name="dokumen" value="<?php echo set_value('dokumen', $barangkeluar['dokumen']); ?>" name="dokumen" class="form-control">
                        <?php echo form_error('dokumen', '<small class="text-danger">', '</small>')?>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</a></button>&nbsp &nbsp
                    <!-- <button type="reset" class="btn btn-secondary">Reset</a></button>&nbsp &nbsp -->
                    <a href="<?php echo base_url() ?>barangkeluar" class="btn btn-warning" >Kembali</a>
                    <?php echo form_close(); ?>  
                </div>
            </div>
            </div>
        </div>
    </div>
</div>   