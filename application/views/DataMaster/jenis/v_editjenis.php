<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Edit Data Jenis Barang</h3><br>
                        <div class="col-md-12 grid-margin">
                            <div class="card-body">
                                <?php foreach ($jenis as $j) { ?>
                                    <form method="POST" action="<?php echo base_url() ?>jenis/update">
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $j->id_jenis?>">
                                            </td>
                                        </tr>
                                        <div class="form-group">
                                            <label>Jenis Barang</label>
                                            <input type="text" name="nama_jenis" class="form-control" value="<?php echo $j->nama_jenis ?>" name="nama_jenis" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</a></button>&nbsp &nbsp
                                        <a href="<?php echo base_url() ?>jenis" class="btn btn-warning" >Kembali</a>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>