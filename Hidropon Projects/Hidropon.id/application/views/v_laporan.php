<div class="col-md-4">
     <div class="card  card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Laporan Harian</b></h3>
        </div>

            <div class="card-body">
            <?php echo form_open('laporan/lap_harian')?>
            <div class="row">
                
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tanggal</label>
                       <select name="tanggal" class="form-control">
                           <?php
                           $mulai = 1;
                           for($i=$mulai; $i < $mulai + 31; $i++){
                                echo '<option value="'. $i. '">'.$i.'</option>';
                                
                           }
                           ?>
                       </select>
                   </div>
                </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                        <?php
                           $mulai = 1;
                           for($i=$mulai; $i < $mulai + 12; $i++){
                                echo '<option value="'. $i. '">'.$i.'</option>';
                                
                           }
                           ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" class="form-control">
                        <?php
                           $mulai = date('Y')-1;
                           for($i=$mulai; $i < $mulai + 10; $i++){
                                echo '<option value="'. $i. '">'.$i.'</option>';
                                
                           }
                           ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">cetak laporan</button>
                      </div>
                    </div>                    
                  </div>
                  <?php echo form_close()?>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Laporan Bulanan</b></h3>
              </div>

            <div class="card-body">


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Laporan Tahunan</b></h3>
              </div>

            <div class="card-body">


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
