<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/pc1.jpg">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/pc2.jpg">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/pc3.jpg">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>



<div class="card card-solid">
<div class="card-body pb-0">
<div class="row">
        <?php foreach ($produk as $key => $value) { ?>
            <div class="col-sm-4">
              <?php
              echo form_open('Belanja/add');
              echo form_hidden('id',$value->id_produk);
              echo form_hidden('qty', 1);
              echo form_hidden('price',$value->harga_produk);
              echo form_hidden('name',$value->nama_produk);
              echo form_hidden('redirect_page',str_replace('index.php/','', current_url()));
              ?>
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <h2 class="lead"><b><?= $value->nama_produk?></b></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      
                      <p class="text-muted text-sm"><b>Kategori: </b> <?= $value->nama_kategori?> </p>
                      <h4><?= $value->berat_produk ?> gram</h4>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url('assets/img/'.$value->foto_produk)?>" alt="user-avatar" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                <div class="row">
                <div class="col-sm-6">
                <div class="text-left">
                   <h6> Rp. <?= number_format($value->harga_produk, 0) ?> </h6>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="text-right">
                    <a href="<?=base_url('home/detail_produk/' . $value->id_produk) ?>" class="btn btn-sm btn-success">
                      <i class="fas fa-eye"></i> Detail
                    </a>
                    <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                      <i class="fas fa-cart-plus"></i> Add
                    </button>
                  </div>
                </div>
                </div>
                </div>
              </div>
              <?php echo form_close();?>
            </div>
<?php } ?>

                        </div>
                    </div>
                </div>


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Produk Berhasil Ditambahkan Ke Keranjang !!!'
      })
    });
  });
</script>