<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                <?php echo form_open(); ?>
                    <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold">Laporan Bahan Diseminasi</h3><br>
                    <div class="col-md-12 grid-margin">
                    <div class="col-md-12 grid-margin">
                        <div class="card shadow mb-12">
                            <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                <div class="table-responsive pt-3 col-md-12 ">
                                <div class="col-md-15">
                                    <div class="form-group">
                                    <label><b>Laporan Transaksi</b></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                        Barang Masuk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                        Barang Keluar
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="">
                                        Barang Kembali
                                        </label>
                                    </div>
                                    <!-- <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Barang Masuk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Barang Keluar
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Barang Kembali
                                        </label>
                                    </div> -->
                                    <div class="form-group"><br>
                                    <label><b>Tanggal</b></label>
                                        <div class="input-group">
                                            <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                            </div>
                                        </div>
                                        <!-- <input value="</?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode Tanggal"> -->
                                        <!-- <input value="</?= set_value('tanggal'); ?>" name="tanggal" id="tanggal_laporan" type="date" name="tanggal_keluar" class="form-control"> -->
                                        <!-- ?php echo form_error('tanggal_keluar', '<div class="text-small text-danger"></div>') ?> -->
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-icon-text">
                                        Cetak
                                        <i class="ti ti-printer"></i>                                                                              
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
                </div>
            </div> 
        </div>                
    </div>
</div>