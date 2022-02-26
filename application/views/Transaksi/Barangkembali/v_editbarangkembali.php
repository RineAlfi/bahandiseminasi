<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold">Edit Data Barang Kembali</h3><br>
                <div class="col-md-12 grid-margin">
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <?php echo form_open_multipart('barangkembali/simpan', []);?>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $detail->id_barangkembali; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Tanggal Keluar</b></label>
                        <input type="date" name="tanggal_keluar" value="<?php echo set_value('tanggal_keluar', $barangkembali->tanggal_keluar); ?>" name="tanggal_keluar" type="text" class="form-control" readonly required>
                        <?php echo form_error('tanggal_keluar', '<div class="text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group">
                        <label><b>Nama Barang</b></label>
                        <select name="barang_id" id="barang_id" class="form-control" disabled required>
                            <option value="" selected disabled>--Pilih Nama Barang--</optiion>
                            <?php foreach($barang as $db) : ?>
                                <option <?php echo $barangkembali->barang_id == $db['id_barang'] ? 'selected' : '';?> <?php echo set_select('barang_id', $db['id_barang']) ?> value="<?php echo $db['id_barang'] ?>"><?php echo $db['nama_barang'] ?></option> 
                            <?php endforeach; ?>
                        </select>
                    <?php echo form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label><b>Tanggal Kembali</b></label>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                        <?php echo form_error('tanggal_kembali', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <label><b>Jumlah Kembali</b></label>
                        <input type="number" name="jumlah_kembali" value="<?php echo set_value('jumlah_kembali', $barangkembali->jumlah_kembali); ?>" name="jumlah_kembali" class="form-control" required>
                        <?php echo form_error('jumlah_kembali', '<div class="text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group">
                        <label><b>Keterangan</b></label>
                        <input type="text" name="keterangan" value="<?php echo set_value('keterangan', $barangkembali->keterangan); ?>" name="keterangan" class="form-control">
                        <?php echo form_error('keterangan', '<div class="text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group">
                        <label><b>Foto Produk</b></label>
                        <input type="file" name="fotokembali" value="<?php echo set_value('foto', $barangkembali->foto); ?>" name="fotokembali" class="form-control">
                        <?php echo form_error('fotokembali', '<div class="text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group">
                        <label><b>File</b></label>
                        <input type="file" name="dokumenkembali" value="<?php echo set_value('dokumen', $barangkembali->dokumenkembali); ?>" name="dokumenkembali" class="form-control">
                        <?php echo form_error('dokumenkembali', '<div class="text-small text-danger"></div>')?>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</a></button>&nbsp &nbsp
                    <!-- <button type="reset" class="btn btn-secondary">Reset</a></button>&nbsp &nbsp -->
                    <a href="<?php echo base_url() ?>barangkembali" class="btn btn-warning" >Kembali</a>
                    <?php echo form_close(); ?>  
                </div>
            </div>
            </div>
        </div>
    </div>
</div>   