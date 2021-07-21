<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Data Foto Produk</b></h3>

                <div class="card-tools">
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                ?>

                <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Foto</th>
                            <th>Jumlah</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($foto_produk as $key => $value) { ?>
                    <tr>
                            <td><?= $no++;?></td>
                            <td><?= $value->nama_produk?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/' . $value->foto_produk)?>"
                            width="100px"></td>
                            <td class="text-center"><h6><?= $value->total_foto ?></h6></td>
                            <td class="text-center">
                                <a href="<?= base_url('foto_produk/add/' . $value->id_produk) ?>" class="btn btn-success btn-xs"><i class="fas fa-plus"></i>Add</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>