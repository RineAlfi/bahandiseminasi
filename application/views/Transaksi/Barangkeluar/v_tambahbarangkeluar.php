<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Tambah Data Barang Keluar</h3><br>
                        <div class="col-md-12 grid-margin">
                            <div class="card-body">
                            <?= form_open_multipart('barangkeluar/tambah', 'class="mt-4"'); ?>
                                <div class="form-group">
                                <label><b>Tanggal keluar</b></label>
                                    <input type="date" name="tanggal_keluar" class="form-control">
                                    <?php echo form_error('tanggal_keluar', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                <label><b>Nama Barang</b></label>
                                        <div class="input-group">
                                            <select name="barang_id" id="barang_id" class="form-control">
                                                <option value="" selected disabled>--Pilih Barang--</option>
                                                <?php foreach ($barang as $b) : ?>
                                                    <option <?php echo set_select('barang_id', $b['id_barang']) ?> value="<?php echo $b['id_barang'] ?>"><?php echo $b['nama_barang']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <?php echo form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                <label><b>Stok</b></label>
                                <div class="col-md-15">
                                    <input readonly="readonly" id="stok" name="stok" type="number" class="form-control">
                                </div>
                                </div>
                                <div class="form-group">
                                <label><b>Jumlah keluar</b></label>
                                    <div class="col-md-15">
                                        <div class="input-group">
                                            <input value="<?php echo set_value('jumlah_keluar');?>" name="jumlah_keluar" id="jumlah_keluar" type="number" class="form-control">
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" id="satuan" >Satuan</span>
                                            </div> -->
                                        </div>
                                        <?php echo form_error('jumlah_keluar', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label><b>Keterangan</b></label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                                    <?php echo form_error('keterangan', '<small class="text-danger">', '</small>')?>
                                </div>
                                <div class="form-group">
                                    <label><b>Foto Produk</b></label>
                                    <input type="file" class="form-control form-control-lg" id="foto" name="foto">
                                    <?php echo form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label><b>Dokumen</b></label>
                                    <input type="file" class="form-control form-control-lg" id="dokumen" name="dokumen">
                                    <?php echo form_error('dokumen', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</a></button>&nbsp &nbsp
                                <!-- <button type="reset" class="btn btn-secondary">Reset</a></button>&nbsp &nbsp -->
                                <a href="<?php echo base_url() ?>barangkeluar" class="btn btn-warning" >Kembali</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
        $('#barang_id').on('input',function(){
        
        var barang_id=$(this).val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('barang/get_barang')?>",
            dataType : "JSON",
            data : {barang_id: barang_id},
            cache:false,
            success: function(data){
                $.each(data,function(barang_id, stok, satuan){
                    // $('[name="nama"]').val(data.nama_barang);

                    $('[name="barang_id"]').val(data.barang_id);
                    $('[name="stok"]').val(data.stok);
                    $('[name="satuan"]').val(data.satuan);
                    
                });
                
            }
        });
        return false;
    });
</script>