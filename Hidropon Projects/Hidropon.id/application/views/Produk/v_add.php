<div class="col-md-12">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Add Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
              //notifikasi form kosong
              echo validation_errors('<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info"></i>', '</h5> </div>');
              //notifikasi gagal upload
              if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>', $error_upload, '</h5> </div>';
              }
              echo form_open_multipart('produk/add')?>

              <div class="form-group">
                        <label>Nama Produk</label>
                        <input name="nama_produk" type="text" class="form-control" placeholder="Nama Produk" 
                        value="<?= set_value('nama_produk')?>">
                      </div>

                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori?>"><?= $value->nama_kategori?></option>
                            <?php } ?>
                        </select>
                      </div>

              <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" 
                        value="<?= set_value('harga_produk')?>">
                      </div>
                    </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Berat Produk</label>
                        <input name="berat_produk" type="text" class="form-control" placeholder="Berat Produk" 
                        value="<?= set_value('berat_produk')?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_produk" class="form-control" placeholder="Deskripsi Produk" 
                        rows="5"><?= set_value('deskripsi_produk')?></textarea>
                      </div>

                  <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Foto Produk</label>
                        <input type="file" name="foto_produk" class="form-control" id="preview_foto" required>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                        <img src="<?= base_url('img/no_img.png') ?>" id="foto_load" width="200px">
                      </div>
                  </div>
                  </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="<?= base_url('produk')?>"class="btn btn-success btn-sm">Kembali</a>
                      </div>

              <?php echo form_close()?>
              </div>
</div>
</div>

<script>
  function lihatFoto(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#foto_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_foto").change(function() {
    lihatFoto(this);
  });
</script>
