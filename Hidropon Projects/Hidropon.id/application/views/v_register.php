<div class="row">
<div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box">
            <div class="card">
                <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

            <?php 
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');
            if ($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> </h5>';
                echo $this->session->flashdata('pesan');
                echo'</div>';
          
                }
            echo form_open('pelanggan/register');
            ?>    
                    <div class="input-group mb-3">
                    <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>"
                    class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="email" name="email_pelanggan" value="<?= set_value('email_pelanggan') ?>"
                    class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" name="password_pelanggan" value="<?= set_value('password_pelanggan') ?>"
                    class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" name="ulangi_password_pelanggan" value="<?= set_value('ulangi_password_pelanggan') ?>"
                    class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" name="telepon_pelanggan" value="<?= set_value('telepon_pelanggan') ?>"
                    class="form-control" placeholder="No telepon">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="text" name="alamat_pelanggan" value="<?= set_value('Alamat_pelanggan') ?>"
                    class="form-control" placeholder="alamat pelanggan">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-home"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                    </div>
              <?php echo form_close()?>

                <a href="<?= base_url('pelanggan/login') ?>" class="text-center">I already have a membership</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
    </div>
<div class="col-sm-4"></div>
</div>
<br>
<br>
<br>
<br>